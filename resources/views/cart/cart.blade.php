<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tbody>
    @foreach($cart as $cartItem)
        <tr>
            <td>
                {{$cartItem['product']->name}}
            </td>
            <td>
                <div style="display: flex;" class="cart-item">
                    {{$cartItem['product']->price}}x
                    <a style="text-decoration: none"
                       href="{{route('cart.update-quantity',['id'=>$cartItem['product']->id,'quantity'=>1])}}">+</a>
                    <input type="number" onchange="updateQuantity(this,{{$cartItem['product']->id}})"
                           value="{{$cartItem['quantity']}}"/>
                    <a style="text-decoration: none"
                       href="{{route('cart.update-quantity',['id'=>$cartItem['product']->id,'quantity'=>-1])}}">-</a>
                    <span class="item-total">{{$cartItem['quantity']*$cartItem['product']->price}}</span>
                </div>
            </td>
            <td>
                <a href="{{route('cart.remove-item',['id'=>$cartItem['product']->id])}}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    <?php $cartCollect = collect($cart);
    $subTotal = $cartCollect->sum(function ($cartItem) {
        return $cartItem['quantity'] * $cartItem['product']->price;
    })
    ?>
    <div class="subtotal">
        SubTotal: {{$subTotal}}
    </div>

    <div class="tax">
        Tax:{{$subTotal*0.1}}
    </div>

    <div class="total">
        Total:{{$subTotal+$subTotal*0.1}}
    </div>
    <form method="post" action="{{route('cart.checkout')}}">
        @csrf
        <input type="text" name="received_name">
        <input type="tel" max="10" name="received_phone">
        <input type="text" name="received_address">
        <button type="submit">Checkout</button>
    </form>
</div>
<a href="">Continue Shopping</a>


<script>
    function updateQuantity(element, id) {
        const quantity = element.value;
        fetch(`/cart/update-quantity-api/${id}/${quantity}`)
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                //window.location.reload();
                element.closest('.cart-item').querySelector('.item-total').innerText = quantity * data['cart-item'].product.price;
                const subTotal = data.data.reduce((total, cartItem) => {
                    return total + cartItem.quantity * cartItem.product.price;
                }, 0);
                document.querySelector('.subtotal').innerText = ` SubTotal: ${subTotal}`;//backstick js
                document.querySelector('.tax').innerText = ` Tax: ${subTotal * 0.1}`;
                document.querySelector('.total').innerText = ` Total: ${subTotal + subTotal * 0.1}`;
            })
    }
</script>
</body>
</html>

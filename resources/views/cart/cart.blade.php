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
<table>
    <tbody>
    @foreach($cart as $cartItem)
        <tr>
            <td>
                {{$cartItem['product']->name}}
            </td>
            <td>
                {{$cartItem['product']->price}}x
                <button>+</button>
                {{$cartItem['quantity']}}
                <button>-</button>
                <div>
                    <input type="text" value="{{$cartItem['quantity']*$cartItem['product']->price}}">
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

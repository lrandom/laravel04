<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto">
        <div class="grid grid-cols-2">
            @foreach($list as $item)
                <div class="border-1 border-solid p-10" style="border:1px solid #cdcdcd">
                    <h3>{{$item->name}}</h3>
                    <p>{{$item->price}}</p>
                    <p>{{$item->content}}</p>
                    <a href="{{route('cart.add', ['id' => $item->id])}}">Add to cart</a>
                </div>
            @endforeach
        </div>
  </div>
</body>
</html>

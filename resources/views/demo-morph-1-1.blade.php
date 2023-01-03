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
@foreach($posts as $post)
    <div>
        @if($post->image)
            <img src="{{$post->image->path}}" alt="">
        @endif
        <h4>{{$post->title}}</h4>
        <p>{{$post->content}}</p>
    </div>
@endforeach

@foreach($products as $product)
    <div>
        @if($product->image)
            <img src="{{$product->image->path}}" alt="">
        @endif
        <h4>{{$product->name}}</h4>
        <p>{{$product->content}}</p>
        <p>{{$product->price}}</p>
    </div>
@endforeach
</body>
</html>

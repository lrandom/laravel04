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
<div>
    <h1>Tagable</h1>
    <ul>
        @foreach($products as $product)
            <li>
                <a href="">{{$product->name}}</a>
                <p>
                    @if($product->tags)
                        @foreach($product->tags as $tag)
                            <span>{{$tag->name}}</span>
                        @endforeach
                    @endif
                </p>
            </li>
        @endforeach

    </ul>

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="">{{$post->title}}</a>
                <p>
                    @if($post->tags)
                        @foreach($post->tags as $tag)
                            <span>{{$tag->name}}</span>
                        @endforeach
                    @endif
                </p>
            </li>
        @endforeach

    </ul>
</div>
</body>
</html>

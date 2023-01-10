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
<h1>
    <div style="display: flex; flex-wrap: nowrap;">
        @foreach($photos as $photo)
            <div style="margin: 10px;">
                <img src="{{asset($photo->path)}}" style="width: 100px; height: 100px;"/>
            </div>
        @endforeach
    </div>
</h1>
<form method='post' action="{{route('gallery.get')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image"/>
    <button>Submit</button>
</form>
</body>
</html>

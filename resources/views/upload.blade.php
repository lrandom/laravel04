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
<img src="{{asset('storage/images/1673352392.jpeg')}}"/>
<form method='post' action="{{route('do-upload')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image"/>
    <button>Submit</button>
</form>
</body>
</html>

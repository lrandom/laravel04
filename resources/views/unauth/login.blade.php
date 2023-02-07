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
<form action="{{route('my-login.post')}}" method="post">
    @csrf
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <p style="color: red">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
    @endif
    <input name="email" placeholder="Email"/>
    <input name="password" placeholder="Password"/>
    <button>Login</button>
</form>
</body>
</html>

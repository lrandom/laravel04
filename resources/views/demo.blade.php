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
@for($i=0;$i<10;$i++)
    <p>{{$i}}</p>
@endfor

<?php $count = 0; ?>
@while($count<10)
    <p>{{$count}}</p>
    <?php  $count++; ?>
@endwhile

@foreach($names as $name)
    <p>{{$name}}</p>
@endforeach

@include('user.profile')
@includeIf('user.profile')
</body>
</html>

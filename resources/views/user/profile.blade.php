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
{{$names[0]}}
{{$names[1]}}
{{$age}}

<?php
//function getTotal()
//{
//    return 10 + 20
//}
?>
{{10+20}}
{{--{{getTotal()}}--}}

@if(true)
    <p>true</p>
@endif


@if(true)
    <p>true</p>
@else
    <p>false</p>
@endif

<?php
$age = 18;
?>
@if($age<=12)
    <p>Nhi đồng</p>
@elseif($age<=18 && $age >12 )
    <p>Thiếu niên</p>
@elseif($age>18 )
    <p>Chịu</p>
@endif


@switch($age)
    @case(12)
    <p>Nhi đồng</p>
    @break

    @case(18)
    <p>Thiếu niên</p>
    @break

    @default
    <p>Chịu</p>
@endswitch

<?php
$arr = [
    'ages' => [
        10, 20, 30
    ],
    'name' => [
        'a', 'b', 'c'
    ]
];
?>

<?php var_dump($arr); ?>

{{dd($arr)}}
</body>
</html>

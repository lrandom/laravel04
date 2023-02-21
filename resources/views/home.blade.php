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
   <form>
       <select name="locale">
           <option value="en" <?php echo app()->getLocale()=='en'?'selected="selected"':''; ?>>English</option>
           <option value="vi" <?php echo app()->getLocale()=='vi'?'selected="selected"':''; ?>>Vietnamese</option>
       </select>
       <button>Change</button>
   </form>


   <p>{{__('main.hello',['name'=>'Luân'])}} - {{__('main.welcome_to_viet_nam')}}</p>

    <a href="/">{{__('Full Name',['name'=>'Luân'])}}</a>
<a href="/about-page">About Page</a>
</body>
</html>

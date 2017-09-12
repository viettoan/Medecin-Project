<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('css/admin/style.css') }}
</head>
<body>
    <div class="wrapper">
    @include('admin._section.header')
    @include('admin._section.aside')
    @yield('content-admin')
    </div>
   
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
</body>
</html>

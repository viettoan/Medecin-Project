<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jon Snow</title>
    <title>@yield('siteTitle')</title>
    <base href='{{ asset('') }}'>
    <link rel="shortcut icon" href="favicon.ico">
    {{ Html::style('bower/components-font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/owl.carousel/dist/assets/owl.carousel.min.css') }}
    {{ Html::style('bower/owl.carousel/dist/assets/owl.theme.default.min.css') }}
    @yield('style')
</head>
<body>
    @yield('content')
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('bower/owl.carousel/docs/assets/owlcarousel/owl.carousel.min.js') }}
    @yield('script')
</body>
</html>

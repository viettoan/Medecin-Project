<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phòng khám Mika</title>
    <title>@yield('siteTitle')</title>
    <base href='{{ asset('') }}'>
    <link rel="icon" type='image/png' href="favicon.png">
    <!-- <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="favi/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favico/favicon-16x16.png">
    <link rel="manifest" href="/favico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"> -->

    <!-- <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script> -->
    {{ Html::script('js/tether1.2.4.js') }}
    {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/hover/css/hover-min.css') }}
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,700&amp;subset=vietnamese" rel="stylesheet">
    {{ Html::style('bower/bootstrap4/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/owl.carousel/dist/assets/owl.carousel.min.css') }}
    {{ Html::style('bower/owl.carousel/dist/assets/owl.theme.default.min.css') }}
    {{ Html::style('css/site.css') }}

    @yield('style')
    <style type="text/css">
        .pagination .page-item a{
          padding:10px;
        }
        .pagination .active {
          border: 1px solid #ddd;
          padding:10px;
          padding-bottom: 5px;
          background: #0275d8;
        }
        .pagination .disabled {
          border: 1px solid #ddd;
          padding:10px;
          padding-bottom: 5px;
          border-bottom-left-radius: .25rem !important;
          border-top-left-radius: .25rem;
        }
    </style>
</head>
<body>
  <div class="element">
    <img src="images/call.png" class='img-responsive' width="250px">
  </div>

    @yield('content')
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/bootstrap4/dist/js/bootstrap.min.js') }}
    {{ Html::script('bower/owl.carousel/docs/assets/owlcarousel/owl.carousel.min.js') }}
    {{ Html::script('bower/vue/dist/vue.min.js') }}
    @yield('script')
    <script type="text/javascript">
        $(document).ready(function(){
          $('.pagination li').addClass('page-item');
          $('.pagination li a').addClass('page-link');
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower/toastr/toastr.min.css') }}
    {{ Html::style('bower/sweetalert2/dist/sweetalert2.css') }}
    {{ Html::style('bower/Ionicons/css/ionicons.min.css') }}
    {{ Html::style('dist/css/AdminLTE.min.css') }}
    {{ Html::style('dist/css/skins/_all-skins.min.css') }}
    {{ Html::style('bower/morris.js/morris.css') }}
    {{ Html::style('bower/jvectormap/jquery-jvectormap.css') }}
    {{ Html::style('bower/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
    {{ Html::style('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
    {{ Html::style('bower/bootstrap-daterangepicker/daterangepicker.css') }}
    {{ Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
    {{ Html::style('css/admin/style2.css') }}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    {!! Charts::styles() !!}
    @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin._section.header')
        @include('admin._section.aside')
        @yield('content-admin')
        <div class="control-sidebar-bg"></div>
    </div>
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/vue/dist/vue.min.js') }}
    {{ Html::script('bower/toastr/toastr.min.js') }}
    {{ Html::script('bower/axios/dist/axios.min.js') }}
    {{ Html::script('bower/vue-paginate/dist/vue-paginate.min.js') }}
    {{ Html::script('bower/sweetalert2/dist/sweetalert2.js') }}
    {{ Html::script('bower/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower/jquery-ui/jquery-ui.min.js') }}
    {{ Html::script('bower/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('bower/raphael/raphael.min.js') }}
    {{ Html::script('bower/morris.js/morris.min.js') }}
    {{ Html::script('bower/jquery-sparkline/dist/jquery.sparkline.min.js') }}
    {{ Html::script('bower/jvectormap/jquery-jvectormap.js') }}
    {{ Html::script('bower/jquery-knob/dist/jquery.knob.min.js') }}
    {{ Html::script('bower/moment/min/moment.min.js') }}
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    {{ Html::script('bower/ckeditor/ckeditor.js') }}
    {{ Html::script('js/config.lfm.ckeditor.js') }}
    {{ Html::script('bower/bootstrap-daterangepicker/daterangepicker.js') }}
    {{ Html::script('bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
    {{ Html::script('bower/jquery-slimscroll/jquery.slimscroll.min.js') }}
    {{ Html::script('bower/fastclick/lib/fastclick.js') }}
    {{ Html::script('bower/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('bower/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ Html::script('bower/fastclick/lib/fastclick.js') }}
    {{ Html::script('dist/js/adminlte.min.js') }}
    {{ Html::script('js/admin/head.js') }}
    @yield('script')
</body>
</html>

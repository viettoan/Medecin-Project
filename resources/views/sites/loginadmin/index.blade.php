@extends('sites.master')
@section('style')
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
     {{ Html::style('css/sites/adminlogin/animate.css') }}
     {{ Html::style('css/sites/adminlogin/style.css') }}
@endsection
@section('content')
<body>
    <div class="container">
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>{{ trans('message.login')}}</h2>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-danger messageLogin" role="alert">{!! session()->get('message') !!}</div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('loginadmin') }}">
                {{ csrf_field() }}
                <label for="username">{{ trans('message.email')}}</label>
                <br/>
                <input type="text" name="email" value="{{ old('email') }}" required autofocus>
                <br/>
                <label for="password">{{ trans('message.Password')}}</label>
                <br/>
                <input type="password" name="password" required>
                <br/>
                <label class="">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('message.Remenber')}}
                </label>
                <br>
                <button type="submit">{{ trans('message.SignIn')}}</button>
                <br/>
            </form>
        </div>
    </div>
</body>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#logo').addClass('animated fadeInDown');
            $("input:text:visible:first").focus();
        });
        $('#username').focus(function() {
            $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function() {
            $('label[for="username"]').removeClass('selected');
        });
        $('#password').focus(function() {
            $('label[for="password"]').addClass('selected');
        });
        $('#password').blur(function() {
            $('label[for="password"]').removeClass('selected');
        });
    </script>
@endsection

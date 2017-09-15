@extends('sites.master')
@section('style')
{{ Html::style('css/site/profile.css') }}
@endsection
@section('content')
@include('sites._include.navbar')

<div class="wrap-page">
    <div class="media-container media2">
        <div class="container banner-title">
            <h1 class="text-center animation-slideDown">
                <strong>
                    Hello Văn Quyết
                </strong>
            </h1>
            <h2 class="h3 text-center animation-slideUp">
                Hãy kiểm tra hồ sơ của bạn!
            </h2>
        </div>
        <img src="http://dinhtai.com/images/mountain.jpg" alt="Image" class="media-image animation-pulseSlow">
    </div>
    <div class="col-md-10 offset-md-2 ok">
        <div class="col-md-3 float-left">
            <div class="card card-body text-center inforprofile">
                <h3><i class="fa fa-address-book" aria-hidden="true"></i> Information</h3></h4>

                <div class="card text-center" style="width: 15rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-id-card-o text-success" aria-hidden="true"></i> Code: <span class="badge badge-success">IMBBM090343434</span>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-bandcamp text-info" aria-hidden="true"></i> Name: Tran Van My 
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-phone text-info" aria-hidden="true"></i> Phone: 0993343434 
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-user-circle text-success" aria-hidden="true"></i> Sex: Name
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-birthday-cake text-primary" aria-hidden="true"></i> Birthday: 19/10/1998
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                               <i class="fa fa-align-center text-danger" aria-hidden="true"></i> Age: 19
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 float-left videoprofile">
            <div class="card card-body">
                <h4 class="card-title">Panel title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="flex-row">
                    <a class="card-link">Card link</a>
                    <a class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sites._include.footer')
@endsection
@section('script')
{{-- {{ Html::script('sites_custom/js/add.js') }} --}}
@endsection

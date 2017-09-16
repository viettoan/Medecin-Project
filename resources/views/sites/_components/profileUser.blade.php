@extends('sites.master')
@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
    <div class="container main">
        <div class="row">
            <div class="col-md-9 post">
                <div class="col-md-12 ">
                    <div class="col-md-12">
                        <div class="card card-body text-center inforprofile">
                            <h3><i class="fa fa-address-book" aria-hi   dden="true"></i> Thong Tin</h3></h4>

                            <div class="card text-center">
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
                                    <li class="list-group-item">
                                        <p>
                                            <a href="{{ route('site.lich-su-kham.index') }}" class="btn btn-warning">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Xem Lich Su Kham
                                            </a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            @include('sites._include.mucluc')
        </div>
    </div>
</div>

@include('sites._include.footer')
@endsection

@section('style')
{{ Html::style('css/sites/profile/profile.css') }}
{{-- {{ Html::style('css/sites/gioithieu.css') }} --}}
{{ Html::style('css/sites/_include/navbar.css') }}
{{ Html::style('css/sites/_include/footer.css') }}
{{ Html::style('css/sites/_include/banner.css') }}
@endsection

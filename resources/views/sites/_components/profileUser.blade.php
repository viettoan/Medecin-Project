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
                      <div class="panel-heading">
                        <h4 class="topic-name">Thông tin khách hàng</h4>
                        <div class="line"></div>
                      </div>
                            <div class=" text-center">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <p>
                                            <i class="fa fa-id-card-o text-success" aria-hidden="true"></i> Mã bệnh nhân: <span class="badge badge-success">{{ $patient->id }}</span>
                                        </p>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <i class="fa fa-bandcamp text-info" aria-hidden="true"></i> Họ tên: {{ $patient->name }}
                                        </p>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <i class="fa fa-phone text-info" aria-hidden="true"></i> Số điện thoại: {{ $patient->phone }}
                                        </p>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <i class="fa fa-user-circle text-success" aria-hidden="true"></i> Giới tính: 
                                            @if ($patient->sex == 1)
                                                {{ trans('message.male') }}
                                            @else
                                                {{ trans('message.female') }}
                                            @endif            
                                        </p>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <i class="fa fa-align-center text-danger" aria-hidden="true"></i> Tuổi: {{ $patient->age }}
                                        </p>
                                    </li>
                                    <li class="list-group-item">
                                        <p>
                                            <a href="{{ route('patient.history.show', $patient->id) }}" >
                                                <i class="fa fa-eye" aria-hidden="true"></i> <strong>XEM LỊCH SỬ KHÁM</strong>
                                            </a>
                                        </p>
                                    </li>
                                </ul>
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

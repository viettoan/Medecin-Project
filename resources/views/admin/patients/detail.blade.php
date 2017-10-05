@extends('admin.master')

@section('content-admin')
<div class="content-admin detail-patient content-wrapper">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a data-target="#detail" role="tab" data-toggle="tab">Detail</a></li>
                <li><a data-target="#history" role="tab" data-toggle="tab">History</a></li>
            </ul>

            <div class="tab-content">
                <!-- detail patient -->
                <div class="tab-pane active" id="detail">
                    <div class=" image-user col-md-4">
                        <div class="box-body box-profile">
                            <div class="col-md-10">
                                <img class="img-responsive img-circle" src="{{ asset('images/avatar.jpg')}}" alt="User profile picture">    
                                <h3 class="profile-username text-center">
                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                {{ $patient->name }}
                                </h3>
                                <a class="btn btn-primary btn-block" href="{{ route('patient.edit', ['id' => $patient->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{ trans('message.edit') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="info-user col-md-8">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-phone" aria-hidden="true"></i>{{ trans('message.phone') }} :</b>
                                <a>{{ $patient->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <b>{{ trans('message.mail') }}:</b>
                                <a>{{ $patient->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-transgender" aria-hidden="true"></i>{{ trans('message.gender') }} :</b>
                                @if ($patient->sex == config('custom.male'))
                                    <a>{{ trans('message.male') }}</a>
                                @else
                                    <a>{{ trans('message.female') }}</a>
                                @endif        
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-birthday-cake" aria-hidden="true"></i>{{ trans('message.age') }} :</b><a>{{ $patient->age }}</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- end detail patient -->

                <!-- history patient -->
                <div class="tab-pane " id="history">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">13-9-2017</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">13-9-2017</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                </div>
            </div>   
        </div>
    </div> 
</div>
@endsection

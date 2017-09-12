@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.users') }}</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-12 admin-actions">
                <button type="button" class="btn btn-success col-md-2">{{ trans('message.new_user') }}</button>
                <form role="form" class="col-md-5">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter user">
                    </div>
                </form>
            </div>
            <table class="table table-hover table-bordered">
                <thead >
                    <tr>
                        <th class="text-center">{{ trans('message.id') }}</th>
                        <th class="text-center">{{ trans('message.name') }}</th>
                        <th class="text-center">{{ trans('message.phone') }}</th>
                        <th class="text-center">{{ trans('message.email') }}</th>
                        <th class="text-center">{{ trans('message.action') }}</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <th class="col-md-1">1</th>
                        <th class="col-md-3">Viet Toan</th>
                        <th class="col-md-3">0123456789</th>
                        <th class="col-md-3">viettoan290696@gmail.com</th>
                        <th class="col-md-1">
                            <a data-toggle="modal" data-target="#infoUser"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Info User -->
    <div class="modal fade" id="infoUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('message.info_user') }}</h4>
                </div>
                <div class="modal-body row">
                    <div class=" image-user col-md-4">
                        <div class="box-body box-profile">
                            <div class="col-md-10">
                                <img class="img-responsive img-circle" src="{{ asset('huonggiang.jpg')}}" alt="User profile picture">    
                                <h3 class="profile-username text-center">
                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                Viet Toan
                                </h3>
                                <a class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{ trans('message.edit') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="info-user col-md-8">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b><i class="fa fa-phone" aria-hidden="true"></i>{{ trans('message.phone') }} :</b>
                                <a>0123456789</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <b>{{ trans('message.mail') }}:</b>
                                <a>
                                    viettoan290696@gmail
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-transgender" aria-hidden="true"></i>{{ trans('message.gender') }} :</b><a>Nam</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-id-card" aria-hidden="true"></i>{{ trans('message.permission') }} :</b>
                                <a>
                                    <span  v-if="fillItem.permission == 0" class="label label-success">
                                        {{ trans('message.customer') }}
                                    </span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-birthday-cake" aria-hidden="true"></i>{{ trans('message.age') }} :</b><a>22</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

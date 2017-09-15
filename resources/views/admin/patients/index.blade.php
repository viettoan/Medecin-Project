@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.patients') }}</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-12 admin-actions">
                <a href="{{ route('patient.create') }}" class="btn btn-success col-md-2">{{ trans('message.new_patient') }}</a>
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
                        <th class="col-md-2">
                            <a data-toggle="modal" data-target="#addVideo"><i class="fa fa-file-video-o" aria-hidden="true"></i></a>
                            <a href="{{ route('patient.show', ['id' => 1]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('patient.edit', ['id' => 1]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Video -->
    <div class="modal fade" id="addVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('message.add_video') }}</h4>
                </div>
                <div class="modal-body ">
                    <form method = "post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>{{ trans('message.video') }}</label>
                            <div>
                                <input type="file" name="video" class="form-control" required=""> 
                                @if ($errors->has('video'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('message.add') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

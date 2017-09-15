@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.categories') }}</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-12 admin-actions">
                <a href="{{ route('category.create') }}" class="btn btn-success col-md-2">{{ trans('message.new_category') }}</a>
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
                        <th class="text-center">{{ trans('message.parent') }}</th>
                        <th class="text-center">{{ trans('message.status') }}</th>
                        <th class="text-center">{{ trans('message.action') }}</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <th class="col-md-1">1</th>
                        <th class="col-md-3">Viet Toan</th>
                        <th class="col-md-3">0123456789</th>
                        <th class="col-md-1 text-center"><span class="label label-default">hide</span></th>
                        <th class="col-md-1">
                            <a href="{{ route('category.edit', ['id' => 1]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

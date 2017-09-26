@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.categories') }}</h2>
        </div>
        <div class="panel-body" id="index-categories">
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
                @foreach ($categories as $category)
                    <tr id="category-{{ $category->id }}">
                        <th class="col-md-1">{{ $category->id }}</th>
                        <th class="col-md-3">{{ $category->name }}</th>
                        <th class="col-md-3">{{ $category->parentCategories['name'] | ''}}</th>
                        <th class="col-md-1 text-center">
                        @if ($category->status == config('custom.category.hide'))
                            <span class="label label-default">{{ trans('message.hide') }}</span></th>
                        @else
                            <span class="label label-success">{{ trans('message.show') }}</span></th>
                        @endif    
                        <th class="col-md-1">
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a v-on:click="deleteCategory('{{ $category->id }}')"><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{ Html::script('js/admin/category.js') }}
@endsection

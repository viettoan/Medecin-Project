@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.edit_category') }}</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-error">
                {{ session('failed') }}
            </div>
        @endif
        <div class="panel-body">
            <form method = "post" enctype="multipart/form-data" action="{{ route('category.update', $categoryEdit->id) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="Category Name" class="form-control" required="" value="{{ $categoryEdit->name }}"> 
                        @if ($errors->has('name'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.parent') }}</label>
                    <select class="form-control" name="parent_id">
                    <option value="0"></option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" @if ($parent->id == $categoryEdit->parent_id) selected="selected" @endif >{{ $parent->name }}</option>
                    @endforeach     
                    </select>
                    @if ($errors->has('parent_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label>{{ trans('message.status') }}</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="{{ config('custom.category.hide') }}" @if ($categoryEdit->status == config('custom.category.hide')) checked="checked" @endif>{{ trans('message.hide') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="status" value="{{ config('custom.category.show') }}" @if ($categoryEdit->status == config('custom.category.show')) checked="checked" @endif>{{ trans('message.show') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.edit') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

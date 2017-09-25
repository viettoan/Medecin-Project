@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.new_category') }}</h2>
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
            <form method = "post" enctype="multipart/form-data" action="{{ route('category.store') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="Category Name" class="form-control" required=""> 
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
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <input type="radio" name="status" value="{{ config('custom.category.hide') }}" checked="checked">{{ trans('message.hide') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="status" value="{{ config('custom.category.show') }}">{{ trans('message.show') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.add') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

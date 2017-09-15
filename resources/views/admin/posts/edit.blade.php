@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.edit_post') }}</h2>
        </div>
        <div class="panel-body">
            <form method = "post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>{{ trans('message.title') }}</label>
                    <div>
                        <input type="text" name="title" placeholder="Title" class="form-control" required=""> 
                        @if ($errors->has('title'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.description') }}</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('message.content') }}</label>
                    <textarea class="form-control" name="content" rows="7"></textarea>
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.edit') }}</button>
            </form>
        </div>  
    </div>
</div>
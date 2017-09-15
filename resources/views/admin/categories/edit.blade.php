@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.edit_category') }}</h2>
        </div>
        <div class="panel-body">
            <form method = "post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="User Name" class="form-control" required=""> 
                        @if ($errors->has('name'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.parent') }}</label>
                    <select class="form-control" name="parent">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('message.password') }}</label>
                    <input type="password" name="password" class="form-control" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label>{{ trans('message.status') }}</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1" checked="checked">{{ trans('message.hide') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="status" value="0">{{ trans('message.show') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.edit') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

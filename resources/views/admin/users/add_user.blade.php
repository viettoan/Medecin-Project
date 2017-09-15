@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.new_user') }}</h2>
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
                    <label>{{ trans('message.email') }}</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
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
                <div class="form-group">
                    <label>{{ trans('message.address') }}</label>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="form-control" required>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.phone') }}</label>
                    <div>
                        <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.age') }}</label>
                    <div>
                        <input type="number" name="age" placeholder="Age" class="form-control" required>
                        @if ($errors->has('age'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <label>{{ trans('message.gender') }}</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="1" checked="checked">{{ trans('message.male') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="gender" value="0">{{ trans('message.female') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.add') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

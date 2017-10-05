@extends('admin.master')

@section('content-admin')
<div class="content-admin content-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.new_patient') }}</h2>
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
            <form method = "POST" enctype="multipart/form-data" action="{{ route('patient.store') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="User Name" class="form-control" value="{{ old('name') }}" required=""> 
                        @if ($errors->has('name'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.email') }}</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('message.address') }}</label>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="form-control" value="{{ old('address') }}" required>
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
                        <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}" required>
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
                        <input type="number" name="age" placeholder="Age" value="{{ old('age') }}" class="form-control" required>
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
                            <input type="radio" name="sex" value="1" checked="checked">{{ trans('message.male') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="sex" value="0">{{ trans('message.female') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.add') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

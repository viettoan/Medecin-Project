@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.edit_patient') }}</h2>
        </div>
        @if (session('failed'))
            <div class="alert alert-warning">
                {{ session('failed') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-warning">
                {{ session('success') }}
            </div>
        @endif
        <div class="panel-body">
            <form method = "POST" enctype="multipart/form-data" action="{{ route('patient.update', ['id' => $patient->id]) }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $patient->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="User Name" class="form-control" value="{{ $patient->name }}" required=""> 
                        @if ($errors->has('name'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.email') }}</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control" value="{{ $patient->email }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('message.address') }}</label>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="form-control" value="{{ $patient->address }}" required>
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
                        <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ $patient->phone }}" required>
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
                        <input type="number" name="age" placeholder="Age" class="form-control" value="{{ $patient->age }}" required>
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
                            <input type="radio" name="sex" value="1" @if ($patient->sex == config('custom.male')) checked="checked" @endif>{{ trans('message.male') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="sex" value="0" @if ($patient->sex == config('custom.female')) checked="checked" @endif>{{ trans('message.female') }}
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">{{ trans('message.edit') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection

@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.edit_user') }}</h2>
        </div>
        <div class="panel-body">
            {!! Form::open([
                'method' => 'post',
                'route' => 'user.store',
                'enctype' => 'multipart/form-data',
            ]) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('message.name')) !!}
                    <div>
                        {!! Form::text('name', null, [
                            'placeholder' => 'User Name',
                            'class' => 'form-control',
                            'required' => 'required',
                        ]) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', trans('message.email')) !!}
                    {!! Form::email('email', null, [
                        'placeholder' => 'Enter Email',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('password', trans('message.password')) !!}
                    {!! Form::password('password',[
                        'placeholder' => 'Password',
                        'class' => 'form-control',
                        'id' => 'password',
                        'required' => 'required',
                    ]) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('address', trans('message.address')) !!}
                    <div>
                        {!! Form::text('address', null, [
                            'placeholder' => 'Address',
                            'class' => 'form-control',
                            'required' => 'required',
                        ]) !!}
                        @if ($errors->has('address'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('phone', trans('message.phone')) !!}
                    <div>
                        {!! Form::text('phone', null, [
                            'placeholder' => 'Phone',
                            'class' => 'form-control',
                            'required' => 'required',
                        ]) !!}
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('Age', trans('message.age')) !!}
                    <div>
                        {!! Form::number('age', null, [
                            'placeholder' => 'Age',
                            'class' => 'form-control',
                            'required' => 'required',
                        ]) !!}
                        @if ($errors->has('age'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    {!! Form::label('gender', trans('message.gender')) !!}
                    <div class="radio">
                        <label>
                            {!! Form::radio('gender', config('custom.male'), true) !!}{{ trans('message.male') }}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        {!! Form::radio('gender', config('custom.female')) !!}{{ trans('message.female') }}
                        </label>
                    </div>
                </div>
                {!! Form::submit(trans('message.add'), ['class' => 'btn btn-default']); !!}
            {!! Form::close() !!}
        </div>  
    </div>
</div>
@endsection

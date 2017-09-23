@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading col-md-12">
        <div class="col-md-3">
            <h2>{{ trans('message.create_user') }}</h2>
        </div>
            <div class="col-md-4 col-md-offset-5" style="margin-top: 15px;">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body" id="adduser">
            <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
             {!! csrf_field() !!}
                <div class="form-group col-md-3">
                    <label>{{ trans('message.name') }}</label>
                    <div>
                        <input type="text" name="name" placeholder="User Name" class="form-control"  v-model="newItem.name"> 
                        <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ trans('message.email') }}</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control"  v-model="newItem.email" >
                    <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'][0] }}</span><br>
                </div>
                <div class="form-group col-md-3 ">
                    <label>{{ trans('message.password') }}</label>
                    <input type="password" name="password" class="form-control"  v-model="newItem.password">
                    <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'][0] }}</span><br>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ trans('message.confirmpassword') }}</label>
                    <input type="password" name="confirm_pass" class="form-control"  v-model="newItem.confirm_pass">
                    <span v-if="formErrors['confirm_pass']" class="error text-danger">@{{ formErrors['confirm_pass'][0] }}</span><br>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ trans('message.address') }}</label>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="form-control"  v-model="newItem.address">
                        <span v-if="formErrors['address']" class="error text-danger">@{{ formErrors['address'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ trans('message.phone') }}</label>
                    <div>
                        <input type="text" name="phone" placeholder="Phone" class="form-control"  v-model="newItem.phone">
                        <span v-if="formErrors['phone']" class="error text-danger">@{{ formErrors['phone'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>{{ trans('message.age') }}</label>
                    <div>
                        <input type="number" name="age" placeholder="Age" class="form-control"  v-model="newItem.age">
                        <span v-if="formErrors['age']" class="error text-danger">@{{ formErrors['age'][0] }}</span><br> 
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="sel1">{{ trans('message.sex') }}</label>
                    <i><label for="name"></label></i>
                    <span v-if="formErrors['sex']" class="error text-danger">@{{ formErrors['sex'][0] }}</span><br>
                    <select  class="form-control create_customer" name="sex" v-model="newItem.sex">
                        <option value="1">{{ __('Male') }}</option>
                        <option value="0">{{ __('Famele') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="sel1">{{ trans('message.permission') }}</label>
                    <span v-if="formErrors['permission']" class="error text-danger">@{{ formErrors['permission'][0] }}</span><br>
                    <select class="form-control" name="permission" v-model="newItem.permission" v-on:change="specialist">
                        <option value=""></option>
                        <option value="1">Amin</option>
                        <option value="2">Bac Sy</option>
                    </select>
                </div>
                <div class="form-group col-md-6" id="sepilisc">
                    <label for="sel1">{{ trans('message.special') }}</label>
                    <select class="form-control" id="sel1" v-model="newItem.specialist_id">
                        <option v-bind:value="list.id" v-for="list in listSpecial">@{{ list.name }}</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="col-md-4">
                <a href="{{ route('user.index') }}" class="btn btn-warning">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <label for="sel1">{{ trans('message.exit') }}</label>
                </a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> 
                {{ trans('message.add') }}</button>
                </div>
            </form>
        </div>  
    </div>
</div>
@endsection
@section('script')
    {{ Html::script('js/user/user.js') }}
@endsection

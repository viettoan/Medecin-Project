@extends('admin.master')

@section('content-admin')
<div class="content-admin">
    <div class="panel panel-default">
        <div class="panel-heading col-md-12">
        <div class="col-md-3">
            <h2>Them Nguoi Dung</h2>
        </div>
            <div class="col-md-4 col-md-offset-5" style="margin-top: 15px;">
                <a href="{{ route('user.index') }}" class="btn btn-warning pull-right">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Thoat
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body" id="adduser">
            <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
             {!! csrf_field() !!}
                <div class="form-group col-md-3">
                    <label>Ho Va Ten</label>
                    <div>
                        <input type="text" name="name" placeholder="User Name" class="form-control"  v-model="newItem.name"> 
                        <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control"  v-model="newItem.email" >
                    <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'][0] }}</span><br>
                </div>
                <div class="form-group col-md-3 ">
                    <label>Mat Khau</label>
                    <input type="password" name="password" class="form-control"  v-model="newItem.password">
                    <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'][0] }}</span><br>
                </div>
                <div class="form-group col-md-3">
                    <label>Xac Nhan MK</label>
                    <input type="password" name="confirm_pass" class="form-control"  v-model="newItem.confirm_pass">
                    <span v-if="formErrors['confirm_pass']" class="error text-danger">@{{ formErrors['confirm_pass'][0] }}</span><br>
                </div>
                <div class="form-group col-md-4">
                    <label>Dia Chi</label>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="form-control"  v-model="newItem.address">
                        <span v-if="formErrors['address']" class="error text-danger">@{{ formErrors['address'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>So Dien Thoai</label>
                    <div>
                        <input type="text" name="phone" placeholder="Phone" class="form-control"  v-model="newItem.phone">
                        <span v-if="formErrors['phone']" class="error text-danger">@{{ formErrors['phone'][0] }}</span><br>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Tuoi</label>
                    <div>
                        <input type="number" name="age" placeholder="Age" class="form-control"  v-model="newItem.age">
                        <span v-if="formErrors['age']" class="error text-danger">@{{ formErrors['age'][0] }}</span><br>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1">Phan Quyen</label>
                    <span v-if="formErrors['permistion']" class="error text-danger">@{{ formErrors['permistion'][0] }}</span><br>
                    <select class="form-control" name="permistion" v-model="newItem.permistion" v-on:change="specialist">
                        <option value=""></option>
                        <option value="2">Bac Sy</option>
                        <option value="3">Amin</option>
                    </select>
                </div>
                <div class="form-group" id="sepilisc">
                    <label for="sel1">Chuyen Khoa</label>
                    <select class="form-control" id="sel1" v-model="newItem.specialist_id">
                        <option v-bind:value="list.id" v-for="list in listSpecial">@{{ list.name }}</option>
                    </select>
                </div>
                <div>
                    <i><label for="name">Gioi Tinh</label></i>
                    <span v-if="formErrors['sex']" class="error text-danger">@{{ formErrors['sex'][0] }}</span><br>
                    <select  class="form-control create_customer" name="sex" v-model="newItem.sex">
                        <option value="1">{{ __('Male') }}</option>
                        <option value="2">{{ __('Famele') }}</option>
                        <option value="3">{{ __('Orther') }}</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> 
                {{ trans('message.add') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection
@section('script')
    {{ Html::script('js/user/user.js') }}
@endsection

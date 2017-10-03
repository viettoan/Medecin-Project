@extends('admin.master')

@section('content-admin')
<div class="content-wrapper" id="listPost">
    <section class="content-header">
        <h1>
            <small>Post</small>
            <a class="btn btn-success" href="{{ route('post.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> ADD</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ trans('message.id') }}</th>
                                    <th class="text-center">{{ trans('message.title') }}</th>
                                    <th class="text-center">{{ trans('message.description') }}</th>
                                    <th class="text-center">{{ trans('message.content') }}</th>
                                    <th class="text-center">{{ trans('message.status') }}</th>
                                    <th class="text-center">{{ trans('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in listPosts"  v-bind:id='"Post-"+ post.id'>
                                    <th class="col-md-1">@{{ post.id }}</th>
                                    <th class="col-md-2">@{{ post.title }}</th>
                                    <th class="col-md-2">
                                        <h5 class="ellipis">
                                            @{{ post.description }}    
                                        </h5>
                                    </th>
                                    <th class="col-md-5 ellipis">@{{ post.content }}</th>
                                    <th class="col-md-1 ellipis" v-if="post.status == 0"> <span class="label label-danger">{{ trans('message.pending') }}</span></th>
                                    <th class="col-md-1 ellipis" v-if="post.status == 1"> <span class="label label-success">{{ trans('message.success') }}</span></th>
                                    <th class="col-md-2">   
                                        <a data-toggle="modal" v-on:click="showDetail(post)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('post.edit', ['id' => 1]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a v-on:click="deletePost(post.id)"><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                                    </th>
                                </tr>
                            </table> 
                            <ul class="pagination">
                                <li v-if="pagination.current_page > 1">
                                    <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber"
                                v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.detail_post') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>{{ trans('message.title') }} :</b>
                                    <p>Lorem Ipsum</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('message.description') }}:</b>
                                    <p>
                                        "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('message.content') }}:</b>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                    </p>
                                </li>
                            </ul>
                            <a  class="btn btn-primary" href="{{ route('post.edit', ['id' => 1]) }}">{{ trans('message.edit') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--         <div class="modal fade" id="infoUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.info_user') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <div class=" image-user col-md-4">
                            <div class="box-body box-profile">
                                <div class="col-md-10">
                                    <img class="img-responsive img-circle" src="{{ asset('images/avatar.jpg')}}" alt="User profile picture"> 
                                    <h3 class="profile-username text-center">
                                        <i class="fa fa-leaf" aria-hidden="true"></i>
                                        @{{ fillItem.name }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="info-user col-md-8">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b><i class="fa fa-phone" aria-hidden="true"></i>{{ trans('message.phone') }} :</b>
                                    <a>@{{ fillItem.phone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <b>{{ trans('message.mail') }}:</b>
                                    <a>
                                        @{{ fillItem.email }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b v-if="fillItem.sex == 0"><i class="fa fa-transgender" aria-hidden="true"></i>{{ trans('message.gender') }} : {{ trans('message.male')}}</b>
                                    <b v-if="fillItem.sex == 1"><i class="fa fa-transgender" aria-hidden="true"></i>{{ trans('message.gender') }} : {{ trans('message.Female')}}</b>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-id-card" aria-hidden="true"></i>{{ trans('message.permission') }} :</b>
                                    <a>
                                        <span  v-if="fillItem.permission == 1" class="label label-success">
                                            {{ trans('message.Admin') }}
                                        </span>
                                        <span  v-if="fillItem.permission == 2" class="label label-success">
                                            {{ trans('message.Doctor') }}
                                        </span>
                                        <span  v-if="fillItem.permission == 3" class="label label-danger">
                                            {{ trans('message.Disable') }}
                                        </span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-birtdday-cake" aria-hidden="true"></i>{{ trans('message.age') }} :</b>@{{ fillItem.age }}
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-birtdday-cake" aria-hidden="true"></i>{{ trans('message.address') }} :</b>@{{ fillItem.address }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div> --}}
       {{--  <div class="modal fade" id="adduser" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ trans('message.edit_user') }}</h4>
                    </div>
                    <div class="modal-body">
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
                                    <option value="2">Doctor</option>
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
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> 
                                    {{ trans('message.add') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div> --}}
                </section>
                {{-- editUser --}}
                {{-- <div class="modal fade" id="editUser" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{ trans('message.edit_user') }}</h4>
                            </div>
                            <div class="modal-body">
                                <form method = "post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                                    <div class="form-group col-md-4">
                                        <label>{{ trans('message.name') }}</label>
                                        <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span><br>
                                        <div>
                                            <input type="text" name="name" placeholder="User Name" class="form-control" v-model="fillItem.name">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>{{ trans('message.phone') }}</label>
                                        <span v-if="formErrorsUpdate['phone']" class="error text-danger">@{{ formErrorsUpdate['phone'][0] }}</span><br>
                                        <div>
                                            <input type="text" name="phone" placeholder="Phone" class="form-control" v-model="fillItem.phone">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>{{ trans('message.email') }}</label>
                                        <span v-if="formErrorsUpdate['email']" class="error text-danger">@{{ formErrorsUpdate['email'][0] }}</span><br>
                                        <input type="email" name="email" placeholder="Enter your email" class="form-control" v-model="fillItem.email">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>{{ trans('message.address') }}</label>
                                        <span v-if="formErrorsUpdate['address']" class="error text-danger">@{{ formErrorsUpdate['address'][0] }}</span><br>
                                        <div>
                                            <input type="text" name="address" placeholder="Address" class="form-control" v-model="fillItem.address">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{ trans('message.age') }}</label>
                                        <span v-if="formErrorsUpdate['age']" class="error text-danger">@{{ formErrorsUpdate['age'][0] }}</span><br>
                                        <div>
                                            <input type="number" name="age" placeholder="Age" class="form-control" v-model="fillItem.age">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ trans('message.gender') }}</label>
                                        <span v-if="formErrorsUpdate['sex']" class="error text-danger">@{{ formErrorsUpdate['sex'][0] }}</span><br>
                                        <select  class="form-control create_customer" name="sex" v-model="fillItem.sex">
                                            <option value="1">{{ __('Male') }}</option>
                                            <option value="0">{{ __('Famele') }}</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-6">
                                        <label>{{ trans('message.permisstion') }}</label>
                                        <span v-if="formErrorsUpdate['permission']" class="error text-danger">@{{ formErrorsUpdate['permission'][0] }}</span><br>
                                        <select class="form-control" name="permission" v-model="fillItem.permission" v-on:change="specialist">
                                            <option value="1">{{ __('Amin') }}</option>
                                            <option value="2">{{ __('Doctor') }}</option>
                                            <option value="3">{{ __('Disable') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6" id="sepilisc">
                                        <label>{{ trans('message.specialist') }}</label>
                                        <select class="form-control" id="sel1" v-model="fillItem.specialist_id" selected>
                                            <option v-bind:value="special.id" v-for="special in listSpecial">@{{ special.name }}</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                            {{ trans('message.Update') }}</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                {{ trans('message.Close') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div> --}}
            </div>
        </section>
    </div>
    @endsection
    @section('script')
    {{ Html::script('js/post/list.js') }}
    @endsection

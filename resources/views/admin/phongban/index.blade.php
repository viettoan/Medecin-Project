@extends('admin.master')

@section('content-admin')
<div class="content-wrapper" id="rooms">
    <section class="content-header"> 
        <h1>
            <small>Phòng Ban</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row col-md-5">
            <div class="box">
                <div class="box-body">
                    <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="createRoom">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.name') }}</label>
                            <div>
                                <input type="text" name="name"  v-model.trim="newItem.name" required="" placeholder="Phòng Ban" class="form-control"> 
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> 
                                {{ trans('message.add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          <div class="modal fade" id="editRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.update') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="editRoom(fillItem.id)">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-12">
                            <label>Phòng Ban</label>
                            <div>
                                <input type="text" name="name" placeholder="Phòng Ban"  required="" class="form-control"  v-model="fillItem.name" required=""> 
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> 
                                {{ trans('message.update') }}
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">{{ trans('message.id') }}</th>
                                <th class="text-center">{{ trans('message.name') }}</th>
                                <th class="text-center">{{ trans('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="room in lists" v-bind:id='"rooms-"+ room.id'>
                                <th  class="text-center">@{{ room.id }}</th>
                                <th  class="text-center">@{{ room.name }}</th>
                                <th  class="col-md-2 text-center">   
                                    <a data-toggle="modal" class="btn btn-success" v-on:click="showRooms(room)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a data-toggle="modal" class="btn btn-danger" v-on:click="deleteRoom(room.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </th>
                            </tr>
                        </tbody>
                        </table> 
                       <ul class="pagination pull-left">
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
    </section>
    @endsection
    @section('script')
    {{ Html::script('js/admin/room.js') }}
    @endsection

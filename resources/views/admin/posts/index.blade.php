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
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            <input id="email" type="text" class="form-control"  v-on:keyup="searchPost" name="email" placeholder="Email">
                        </div>
                    </div>
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
                                    <th class="col-md-1 ellipis" v-if="post.status == 1"> <span class="label label-success">{{ trans('message.show') }}</span></th>
                                    <th class="col-md-2">   
                                        <a data-toggle="modal" v-on:click="showDetail(post)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a v-bind:href="'/admin/post/'+ post.id +'/edit'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.detail_post') }} <span class="label label-success" v-if="fillItem.status == 1"> {{ trans('message.show') }}</span> <span class="label label-danger" v-if="fillItem.status == 0">{{ trans('message.pending')}}</span></h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>{{ trans('message.title') }} :</b>
                                    <p>@{{ fillItem.title }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ trans('message.description') }}:</b>
                                    <p>
                                        @{{ fillItem.description }}
                                    </p>
                                </li>
                                <li class="list-group-item">
                                <b>{{ trans('message.image') }}:</b>
                                    <p class="text-center"> 
                                        <a v-bind:href="fillItem.image" target="_blank">
                                        <img v-bind:src="fillItem.image" style="height: 200px;">
                                        </a>
                                    </p>
                                </li>
                                <li class="list-group-item content_post">
                                    <b>{{ trans('message.content') }}:</b>
                                    <p>
                                        @{{ fillItem.content }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </section>
    </div>
    @endsection
    @section('script')
    {{ Html::script('js/post/list.js') }}
    @endsection

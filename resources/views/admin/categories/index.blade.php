@extends('admin.master')

@section('content-admin')
<div class="content-admin content-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.categories') }}</h2>
        </div>
        <div class="panel-body" id="index-categories">
            <div class="col-md-12 admin-actions">
                <a href="javascript:void(0)" v-on:click="createCategory()" class="btn btn-success col-md-2"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('message.new_category') }}</a>
            </div>
            <table class="table table-hover table-bordered">
                <thead >
                    <tr>
                        <th class="text-center">{{ trans('message.id') }}</th>
                        <th class="text-center">{{ trans('message.name') }}</th>
                        <th class="text-center">{{ trans('message.parent') }}</th>
                        <th class="text-center">{{ trans('message.status') }}</th>
                        <th class="text-center">{{ trans('message.action') }}</th>
                    </tr>   
                </thead>
                <tbody>
                    <tr v-for="item in categories">
                        <th class="col-md-1">@{{ item.id }}</th>
                        <th class="col-md-3">@{{ item.name }}</th>
                        <th class="col-md-3" v-if="item.parent_categories != null">@{{ item.parent_categories.name }}</th>
                        <th class="col-md-3" v-else></th>
                        <th class="col-md-1 text-center">
                            <span class="label label-default" v-if="item.status == {{ config('custom.category.hide') }}">{{ trans('message.hide') }}</span>
                            <span class="label label-success" v-if="item.status == {{ config('custom.category.show') }}">{{ trans('message.show') }}</span>
                        </th>
                        <th class="col-md-1 text-center">
                            <a href="javascript:void(0)"  class="btn btn-success" v-on:click="editCategory(item.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                           {{--  <a v-on:click="deleteCategory(item.id)"><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a> --}}
                        </th>
                    </tr>    
                </tbody>
            </table>
            <!-- New Category modal -->
            <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{ trans('message.new_category') }}</h4>
                        </div>

                        <div class="modal-body ">
                            <form method = "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ trans('message.name') }}</label>
                                    <div>
                                        <input type="text" name="name" v-model="category.name" placeholder="Category Name" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('message.parent') }}</label>
                                    <select class="form-control" name="parent_id" v-model="category.parent_id">
                                        <option value="0"></option>
                                        <option v-for="item in categories" v-bind:value="item.id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label>{{ trans('message.status') }}</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="{{ config('custom.category.hide') }}" v-model="category.status">{{ trans('message.hide') }}
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="status" value="{{ config('custom.category.show') }}" v-model="category.status" :checked="category.status">{{ trans('message.show') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" v-on:click="storeCategory()" class="btn btn-default">{{ trans('message.add') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update Category modal -->
            <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{ trans('message.edit_category') }}</h4>
                        </div>

                        <div class="modal-body ">
                            <form method = "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ trans('message.name') }}</label>
                                    <div>
                                        <input type="text" name="name" v-model="category.name" placeholder="Category Name" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('message.parent') }}</label>
                                    <select class="form-control" name="parent_id" v-model="category.parent_id">
                                        <option value="0"></option>
                                        <option v-for="item in categories" v-bind:value="item.id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label>{{ trans('message.status') }}</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="{{ config('custom.category.hide') }}" v-model="category.status" :checked="category.status == {{ config('custom.category.hide') }}">{{ trans('message.hide') }}
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="status" value="{{ config('custom.category.show') }}" v-model="category.status" :checked="category.status == {{ config('custom.category.show') }}">{{ trans('message.show') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" v-on:click="updateCategory(category.id)" class="btn btn-default">{{ trans('message.edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{ Html::script('js/admin/category.js') }}
@endsection

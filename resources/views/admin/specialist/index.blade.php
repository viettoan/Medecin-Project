@extends('admin.master')

@section('content-admin')
<div class="content-wrapper" id="OK">
    <section class="content-header"> 
        <h1>
            <small>SPECIALIST</small>
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
                    <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="createSpecial">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.name') }}</label>
                            <div>
                                <input type="text" name="name" placeholder="User Name" class="form-control"  v-model="newItem.name" > 
                                <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.status') }}</label>
                            <select  class="form-control" name="status" v-model="newItem.status">
                                <option value="0">{{ __('Pending') }}</option>
                                <option value="1">{{ __('Show') }}</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.image') }}</label>
                            <div>
                             <span v-if="formErrors['image']" class="error text-danger">@{{ formErrors['image'][0] }}</span><br>
                            <div class="file-upload-form">
                                <input type="file" @change="previewImage"  accept="image/*" name="image">
                            </div>
                             <div class="image-preview" v-if="imageData.length > 0">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12">
                            <label>{{ trans('message.description') }}</label>
                            <div>
                                <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'][0] }}</span><br>
                                <textarea class="form-control" rows="3" id="description" v-model="newItem.description"></textarea>
                               
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>{{ trans('message.content') }}</label>
                            <span v-if="formErrors['content']" class="error text-danger">@{{ formErrors['content'][0] }}</span><br>
                           <textarea class="form-control" rows="10" id="content" v-model="newItem.content"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> 
                                {{ trans('message.add') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          <div class="modal fade" id="infoSpecialist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.update') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <form method = "POST" enctype="multipart/form-data" v-on:submit.prevent="updateSpecial(fillItem.id)">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.name') }}</label>
                            <div>
                                <input type="text" name="name" placeholder="User Name" class="form-control"  v-model="fillItem.name" required=""> 
                                <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ trans('message.status') }}</label>
                            <select  class="form-control" name="status" v-model="fillItem.status">
                                <option value="0">{{ __('Pending') }}</option>
                                <option value="1">{{ __('Show') }}</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12">
                            <label>{{ trans('message.image') }}</label>
                            <div class="file-upload-form">
                                <input type="file" @change="previewImage" accept="image/*" name="image">
                            </div>
                            <div class="col-md-4">
                                <label>{{ trans('message.image_old') }}</label>
                                <br>
                                <img v-bind:src="fillItem.image" class="image_new">
                            </div>
                            <div class="col-md-4 col-md-offset-4 image-preview" v-if="imageData.length > 0">
                                <label>{{ trans('message.image_new') }}</label>
                                <br>
                                <img class="preview image_new" :src="imageData">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12">
                            <label>{{ trans('message.description') }}</label>
                            <textarea class="form-control" rows="2" id="description" v-model="fillItem.description"></textarea>
                        </div>
                        <div class="clearfix"></div>
                         <div class="form-group col-md-12">
                            <label>{{ trans('message.content') }}</label>
                           <textarea class="form-control" rows="5" v-model="fillItem.content"></textarea>
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
                                <th class="text-center">{{ trans('message.status') }}</th>
                                <th class="text-center">{{ trans('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="list in lists"  v-bind:id='"list-"+ list.id'>
                                <th  class="text-center">@{{ list.id }}</th>
                                <th  class="text-center">@{{ list.name }}</th>
                                <th  class="text-center" v-if="list.status == 0"> <span class="label label-danger">{{ trans('message.pending') }}</span></th>
                                <th class="text-center" v-if="list.status == 1"> <span class="label label-success">{{ trans('message.success') }}</span></th>
                                <th  class="col-md-2 text-center">   
                                    <a data-toggle="modal" class="btn btn-success" v-on:click="showList(list)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </th>
                            </tr>
                        </tbody>
                        </table> 
                        <ul class="pagination pull-right">
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
    {{ Html::script('js/admin/specialist.js') }}
    {{-- <script>
        CKEDITOR.replace('content1', {
        filebrowserBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
    </script>
    <script>
        CKEDITOR.replace('content1');
    </script>
    <script>
        CKEDITOR.replace('content', {
        filebrowserBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('bower/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('bower/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
    </script>
    <script>
        CKEDITOR.replace('content');
    </script> --}}
    @endsection

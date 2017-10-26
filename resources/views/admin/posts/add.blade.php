@extends('admin.master')

@section('content-admin')
<div class="content-wrapper" id="add_Post">
    <section class="content-header">
        <h1>
            <small>Creat Post</small>
            <a class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Exit</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <form method = "post" enctype="multipart/form-data" v-on:submit.prevent="createPost">
                <div class="form-group">
                    <label>{{ trans('message.title') }}</label>
                        <span v-if="formPostErrors['title']" class="error text-danger">@{{ formPostErrors['title'][0] }}</span><br>
                    <div>
                        <input type="text" name="title" v-model="postItem.title" placeholder="Title" class="form-control"> 
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.image') }}</label>
                        <span v-if="formPostErrors['image']" class="error text-danger">@{{ formPostErrors['image'][0] }}</span><br>
                    <div>
                        <div class="file-upload-form">
                            <input type="file" @change="previewImage" accept="image/*" name="image">
                        </div>
                        <div class="image-preview" v-if="imageData.length > 0">
                            <img class="preview" :src="imageData">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" id="sepilisc">
                    <label for="sel1">{{ trans('message.status') }}</label>
                    <span v-if="formPostErrors['status']" class="error text-danger">@{{ formPostErrors['status'][0] }}</span><br>
                    <select class="form-control" v-model="postItem.status" name="status">
                        <option v-bind:value="0">{{ trans('message.pending') }}</option>
                        <option v-bind:value="1">{{ trans('message.show') }}</option>
                        <option v-bind:value="2">{{ trans('message.about') }}</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" id="sepilisc">
                    <label for="sel1">{{ trans('message.category') }}</label>
                    <span v-if="formPostErrors['category_id']" class="error text-danger">@{{ formPostErrors['category_id'][0] }}</span><br>
                    <select class="form-control" v-model="postItem.category_id" name="category_id">
                        <option v-bind:value="list.id" v-for="list in listCategories">@{{ list.name }}</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label>{{ trans('message.description') }}</label>
                    <span v-if="formPostErrors['description']" class="error text-danger">@{{ formPostErrors['description'][0] }}</span><br>
                    <textarea class="form-control" name="description" rows="3" v-model="postItem.description"></textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('message.content') }}</label>
                    <span v-if="formPostErrors['content']" class="error text-danger">@{{ formPostErrors['content'][0] }}</span><br>
                    <textarea class="form-control" rows="7" id="content" v-model="postItem.content"></textarea>
                </div>
                <script>
                    CKEDITOR.replace('content', options);
                </script>
                <div class="clearfix"></div>
                <a class="btn btn-warning" href="{{ route('post.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('message.exit') }}</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('message.add') }}</button>
            </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
    {{ Html::script('js/post/add.js') }}
    @endsection

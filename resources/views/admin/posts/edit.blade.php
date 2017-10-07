@extends('admin.master')

@section('content-admin')
<div class="content-wrapper" id="editPost">
    <section class="content-header">
        <h1>
            <small>Edit Post</small>
            @if($post->status == 0)
            <span class="label label-danger">pending</span>
            @endif
            @if($post->status == 1)
            <span class="label label-success">show</span>
            @endif
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
                    @if(session()->has('message'))
                        <div class="alert alert-success messageLogin" role="alert">{!! session()->get('message') !!}</div>
                    @endif
                        <form method = "post" enctype="multipart/form-data"  action="{{ route('post.update', $post->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('message.title') }}</label>
                                <div>
                                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $post->title }}"> 
                               </div>
                            </div>
                            <div class="form-group" id="sepilisc">
                                <label>{{ trans('message.status') }}</label>
                                <select class="form-control" name="status">
                                    <option value="0" @if ($post->status  == 0) selected="selected" @endif>{{ trans('message.pending') }}</option>
                                    <option value="1" @if ($post->status  == 1) selected="selected" @endif>{{ trans('message.show') }}</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>{{ trans('message.image') }}</label>
                                <div>
                                    <div class="file-upload-form">
                                        <input type="file" @change="previewImage" accept="image/*" name="image" value="{{ $post->image }}">
                                    </div>
                                    <br>
                                    <div class="col-md-5">
                                    <div class="col-md-4">
                                        <label>{{ trans('message.image_old') }}</label>
                                        <br>
                                        <img src="{{ asset($post->image) }}" class="image_new">
                                        
                                    </div>
                                    <div class="col-md-4 col-md-offset-4 image-preview" v-if="imageData.length > 0">
                                        <label>{{ trans('message.image_new') }}</label>
                                        <br>
                                        <img class="preview image_new" :src="imageData">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label>{{ trans('message.description') }}</label>
                                <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
                            </div>
                            <div class="form-group" id="sepilisc">
                                <label>{{ trans('message.category') }}</label>
                                <select class="form-control" name="category_id">
                                    <option value="0"></option>
                                    @foreach ($categories as $parent)
                                    <option value="{{ $parent->id }}" @if ($parent->id == $post->category_id) selected="selected" @endif >{{ $parent->name }}</option>
                                    @endforeach     
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('message.content') }}</label>
                                <textarea class="form-control" name="content" rows="7"> {{ $post->description }} </textarea>
                            </div>
                            <a class="btn btn-warning" href="{{ route('post.index') }}"> <i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('message.exit') }}</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('message.edit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
{{ Html::script('js/post/edit.js') }}
@endsection

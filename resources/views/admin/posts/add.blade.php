@extends('admin.master')

@section('content-admin')
<div class="content-admin" id="add_Post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ trans('message.new_post') }}</h2>
        </div>
        <div class="panel-body">
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
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ trans('message.content') }}</label>
                    <span v-if="formPostErrors['content']" class="error text-danger">@{{ formPostErrors['content'][0] }}</span><br>

                    <textarea class="form-control" rows="7" id="content" v-model="postItem.content"></textarea>
                    {{-- <script>
                        CKEDITOR.replace('content');
                    </script>
 --}}                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <a class="btn btn-warning" href="{{ route('post.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('message.exit') }}</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('message.add') }}</button>
            </form>
        </div>  
    </div>
</div>
@endsection
@section('script')
{{ Html::script('js/post/add.js') }}
@endsection
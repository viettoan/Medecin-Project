@extends('admin.master')

@section('content-admin')
<div class="content-wrapper">
    <div class="content-admin" id="index-videos">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="javascript:void(0)" v-on:click="createVideo()" class="btn btn-success col-md-2">{{ trans('message.new_video') }}</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>{{ trans('message.show') }}</h2>
            </div>

            <div class="panel-body">
                <div class="col-md-3 video-item" v-for="item in videos" v-if="item.status == 3">
                    <video controls="controls" width="100%" >
                        <source :src="item.path" type="video/mp4" />
                    </video>
                    <div>
                        <ul class="list-unstyled list-inline">
                            <li>
                                <button class="btn btn-danger" v-on:click="deleteVideo(item.id)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-warning" v-on:click="changeStatus(item.id)">
                                    {{ trans('message.hide') }}
                                </button>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>{{ trans('message.hide') }}</h2>
            </div>

            <div class="panel-body">
                <div class="col-md-3 video-item" v-for="item in videos" v-if="item.status == 4">
                    <video controls="controls" width="100%" >
                        <source :src="item.path" type="video/mp4" />
                    </video>
                    <div>
                        <ul class="list-unstyled list-inline">
                            <li>
                                <button class="btn btn-danger" v-on:click="deleteVideo(item.id)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-warning" v-on:click="changeStatus(item.id)">
                                    {{ trans('message.show') }}
                                </button>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- New slider modal -->
        <div class="modal fade" id="newVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('message.new_slider') }}</h4>
                    </div>

                    <div class="modal-body ">
                        <form method = "POST" id="storeSlider" enctype="multipart/form-data" action="{{ route('sliders.store') }}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('message.video') }}</label>
                                <div>
                                    <input  type="file" name="video[]" id="video" v-on:change="onFileChange" multiple accept="video/*">
                                </div>
                                <div class="col-md-12" v-if="videoData.length > 0">
                                    <video controls="controls" width="100%" >
                                        <source :src="videoData" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                            <button type="button" v-on:click="storeVideo()" class="btn btn-default">{{ trans('message.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
@section('script')
    {{ Html::script('js/admin/videos.js') }}
@endsection

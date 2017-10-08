@extends('admin.master')

@section('content-admin')
<div class="content-wrapper">
    <div class="content-admin" id="index-sliders">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="javascript:void(0)" v-on:click="createSlider()" class="btn btn-success col-md-2">{{ trans('message.new_slider') }}</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>{{ trans('message.show') }}</h2>
            </div>

            <div class="panel-body">
                <div class="col-md-3 slider-item" v-for="item in sliders" v-if="item.status == 2">
                    <img :src="item.path" class="img-responsive">
                    <div class="slider-action">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <button class="btn btn-danger btn-lg" v-on:click="deleteSlider(item.id)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-warning btn-lg" v-on:click="changeStatus(item.id)">
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
                <div class="col-md-3 slider-item" v-for="item in sliders" v-if="item.status == 1">
                    <img :src="item.path" class="img-responsive">
                    <div class="slider-action">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <button class="btn btn-danger btn-lg" v-on:click="deleteSlider(item.id)">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-success btn-lg" v-on:click="changeStatus(item.id)">
                                    {{ trans('message.show') }}
                                </button>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- New slider modal -->
        <div class="modal fade" id="newSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <label>{{ trans('message.slider') }}</label>
                                <div>
                                    <input  type="file" name="image[]" id="image" v-on:change="onFileChange" multiple>
                                </div>
                                <div class="image-preview row" v-if="imageData.length > 0">
                                    <img class="col-md-12 img-responsive" :src="imageData" >
                                </div>
                            </div>
                            <div>
                                <label>{{ trans('message.status') }}</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="{{ config('custom.media.sliders.hide') }}" v-model="slider.status" required="required">{{ trans('message.hide') }}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="status" value="{{ config('custom.media.sliders.show') }}" v-model="slider.status">{{ trans('message.show') }}
                                    </label>
                                </div>
                            </div>
                            <button type="button" v-on:click="storeSlider()" class="btn btn-default">{{ trans('message.add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
@section('script')
    {{ Html::script('js/admin/sliders.js') }}
@endsection

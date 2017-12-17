@extends('admin.master')

@section('content-admin')
<div class="content-admin content-wrapper">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Lịch Bác Sỹ</h2>
        </div>
        <div class="panel-body" id="index-calendar">
            @if (Auth::user()->permission == config('custom.admin'))
            <div class="col-md-12 admin-actions">
                <a href="javascript:void(0)" v-on:click="createCalendar()" class="btn btn-success col-md-2">Tạo Lịch Mới</a>
            </div>
            <br><br>
            @endif
            <table class="table table-hover table-bordered">
                <thead >
                    <tr>
                        <th class="text-center">Bác SỸ</th>
                        <th class="text-center">Phòng Ban</th>
                        <th class="text-center">Sáng</th>
                        <th class="text-center">Chiều</th>
                        <th class="text-center">Tối</th>
                        @if (Auth::user()->permission == config('custom.admin'))
                        <th class="text-center">{{ trans('message.action') }}</th>
                        @endif
                    </tr>   
                </thead>
                <tbody>
                    <tr v-for="item in calendars">
                        <th>@{{ item.doctor.name }}</th>
                        <th>@{{ item.room }}</th>
                        <th>
                            <i class="fa fa-check" aria-hidden="true" v-if="item.morning == 1"></i>
                        </th>
                        <th>
                            <i class="fa fa-check" aria-hidden="true" v-if="item.afternoon == 1"></i>
                        </th>
                        <th>
                            <i class="fa fa-check" aria-hidden="true" v-if="item.night == 1"></i>
                        </th>
                        @if (Auth::user()->permission == config('custom.admin'))
                        <th class="col-md-1">
                            <a href="javascript:void(0)" v-on:click="editCalendar(item.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a v-on:click="deleteCalendar(item.id)"><i class="fa fa-fw  fa-close get-color-icon-delete" ></i></a>
                        </th>
                        @endif
                    </tr>    
                </tbody>
            </table>
            <!-- New Calendar modal -->
            <div class="modal fade" id="newCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{ trans('message.new') }}</h4>
                        </div>

                        <div class="modal-body ">
                            <form method = "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ trans('message.doctor') }}</label>
                                    <select class="form-control" name="user_id" v-model="calendar.user_id">
                                        <option v-for="item in doctors" v-bind:value="item.id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('message.room') }}</label>
                                    <div>
                                        <input type="text" name="room" v-model="calendar.room" placeholder="Room" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="morning" value="{{ config('custom.calendar.yes') }}" v-model="calendar.morning">{{ trans('message.morning') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="afternoon" value="{{ config('custom.calendar.yes') }}" v-model="calendar.afternoon">{{ trans('message.afternoon') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="night" value="{{ config('custom.calendar.yes') }}" v-model="calendar.night">{{ trans('message.night') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" v-on:click="storeCalendar()" class="btn btn-default">{{ trans('message.add') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Update Calendar modal -->
            <div class="modal fade" id="updateCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('message.close') }}</span></button>
                            <h4 class="modal-title" id="myModalLabel">Sửa Lịch </h4>
                        </div>

                        <div class="modal-body ">
                            <form method = "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                 <div class="form-group">
                                    <label>Bác Sỹ</label>
                                    <select class="form-control" name="user_id" v-model="calendar.user_id">
                                        <option v-for="item in doctors" v-bind:value="item.id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Phòng</label>
                                    <div>
                                        <input type="text" name="room" v-model="calendar.room" placeholder="Room" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" value="{{ config('custom.calendar.yes') }}" v-model="calendar.morning" :checked="calendar.morning == {{ config('custom.calendar.yes') }}">{{ trans('message.morning') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" value="{{ config('custom.calendar.yes') }}" v-model="calendar.afternoon" :checked="calendar.afternoon == {{ config('custom.calendar.yes') }}" >{{ trans('message.afternoon') }}
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" value="{{ config('custom.calendar.yes') }}" v-model="calendar.night" :checked="calendar.night == {{ config('custom.calendar.yes') }}">{{ trans('message.night') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="button" v-on:click="updateCalendar(calendar.id)" class="btn btn-default">{{ trans('message.edit') }}</button>
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
    {{ Html::script('js/admin/doctor_calendar.js') }}
@endsection

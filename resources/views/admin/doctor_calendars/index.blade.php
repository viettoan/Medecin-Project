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
                        <th class="text-center">Phòng</th>
                        <th class="text-center">Thu 2</th>
                        <th class="text-center">Thu 3</th>
                        <th class="text-center">Thu 4</th>
                        <th class="text-center">Thu 5</th>
                        <th class="text-center">Thu 6</th>
                        <th class="text-center">Thu 7</th>
                        <th class="text-center">Chu nhat</th>
                        @if (Auth::user()->permission == config('custom.admin'))
                        <th class="text-center">{{ trans('message.action') }}</th>
                        @endif
                    </tr>   
                </thead>
                <tbody>
                    <tr v-for="item in rooms">
                        <th>@{{ item.name }}</th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.mon == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.tue == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.wed == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.thu == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.fri == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.sat == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        <th>
                            <span v-for= "doctor in item.doctor_calender" v-if="doctor.sun == 1">@{{ doctor.doctor.name }}<br></span>
                        </th>
                        @if (Auth::user()->permission == config('custom.admin'))
                        <th class="col-md-1">
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
                                    <select class="form-control" name="room_id" v-model="calendar.room_id">
                                        <option v-for="item in rooms" v-bind:value="item.id">@{{ item.name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="mon" value="{{ config('custom.calendar.yes') }}" v-model="calendar.mon">Thu 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="tue" value="{{ config('custom.calendar.yes') }}" v-model="calendar.tue">Thu 3
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="wed" value="{{ config('custom.calendar.yes') }}" v-model="calendar.wed">Thu 4
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="thu" value="{{ config('custom.calendar.yes') }}" v-model="calendar.thu">Thu 5
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="fri" value="{{ config('custom.calendar.yes') }}" v-model="calendar.fri">Thu 6
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="sat" value="{{ config('custom.calendar.yes') }}" v-model="calendar.sat">Thu 7
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="sun" value="{{ config('custom.calendar.yes') }}" v-model="calendar.sun">Chu nhat
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
                                            <input type="checkbox" name="mon" value="{{ config('custom.calendar.yes') }}" v-model="calendar.mon">Thu 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="tue" value="{{ config('custom.calendar.yes') }}" v-model="calendar.tue">Thu 3
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="wed" value="{{ config('custom.calendar.yes') }}" v-model="calendar.wed">Thu 4
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="thu" value="{{ config('custom.calendar.yes') }}" v-model="calendar.thu">Thu 5
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="fri" value="{{ config('custom.calendar.yes') }}" v-model="calendar.fri">Thu 6
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="sat" value="{{ config('custom.calendar.yes') }}" v-model="calendar.sat">Thu 7
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="sun" value="{{ config('custom.calendar.yes') }}" v-model="calendar.sun">Chu nhat
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

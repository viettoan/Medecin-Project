<div id="header_admin">
<header class="main-header">
    <a href="{{ route('home-admin') }}" class="logo">
        <span class="logo-mini"><b>M</b>DC</span>
        <span class="logo-lg"><b>Medicin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/avatar.png') }}" class="user-image" alt="User Image">
                        @if(Auth::check())
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('dist/img/avatar.png') }}" class="user-image" alt="User Image">
                            @if(Auth::check())
                            <p>
                                {{ Auth::user()->name }}
                            </p>
                            @endif
                        </li>
                        <li class="user-footer">
                            @if(Auth::check())
                            <div class="pull-left text-center">
                                <a v-on:click="showProfile({{ Auth::user()->id }})" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            @endif
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li> 
            </ul>
        </div>
    </nav>
</header>
<div id="Profile_amind" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('message.infor_user') }}</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            {{-- <img class="img-responsive img-circle" src="{{ asset('images/avatar.jpg')}}"> --}}
                            <img src="{{ asset('dist/img/avatar.png') }}" class="user-image img-responsive img-circle" alt="User Image">
                            <br>
                            @if ( Auth::check())
                            @if (Auth::user()->permission == 1)
                            <span class="label label-success">Admin</span>
                            @endif
                            @if (Auth::user()->permission == 2)
                                <span class="label label-success">Doctor</span>
                            @endif
                        @endif
                        </div>
                        <div class=" col-md-8 col-lg-8 ">
                            <div class="panel-group">
                            @if(Auth::check())
                                <div class="panel panel-default">
                                    <div class="panel-heading">General Information</div>
                                    <div class="panel-body">
                                        <table class="table table-hover" id="infor_user_admin">
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-user-o"></i> Name
                                                        </strong>
                                                    </td>
                                                    <td>@{{ profile.name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-envelope-o"></i> Email
                                                        </strong>
                                                    </td>
                                                    <td>@{{ profile.email }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-font-awesome"></i> Phone
                                                        </strong>
                                                    </td>
                                                    <td> 
                                                    @{{ profile.phone }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-transgender"></i> Gender
                                                        </strong>
                                                    </td>
                                                    
                                                    <td v-if="profile.sex == 1">Male</td>
                                                  
                                                    <td v-if="profile.sex == 0">Famele</td>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-address-card" aria-hidden="true"></i> Address
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        @{{ profile.address }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-3">
                                                        <strong>
                                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i> Age
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        @{{ profile.age }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <div id="change_password">
                                        <form v-on:submit.prevent="updatepass({{ Auth::user()->id }})">
                                        <div class="input-group col-md-12">
                                            <span class="input-group-addon"> <i class="fa fa-key" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" name="password" v-model="changepass.password" placeholder="Password">

                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" class="form-control"  v-model="changepass.confirm_password" name="confirm_password" placeholder="Confirm Password">
                                        </div>
                                        <br>
                                            <div class="pull-right">
                                                <button class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Update</button> 
                                            </div>
                                        </form> 
                                    </div>
                                    <div id="edit_profile">
                                        <form v-on:submit.prevent="updateProfile({{ Auth::user()->id }})">
                                        <div class="input-group col-md-12">
                                            <span class="input-group-addon">
                                                <i class="fa fa-address-book" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="form-control" name="name" v-model="profile.name" placeholder="Name">

                                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control"  v-model="profile.email" name="email" placeholder="Confirm Password">
                                        </div>
                                        <br>
                                         <div class="input-group col-md-12">
                                            <span class="input-group-addon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="address" v-model="profile.address">

                                            <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="phone" v-model="profile.phone">
                                        </div>

                                        <br>
                                        <div class="input-group col-md-12">
                                            <div class="col-md-6">
                                            <span>Age</span>
                                            <input type="text" class="form-control" name="address" v-model="profile.age">
                                            </div>
                                            <div class="col-md-6">
                                            <span> Sex</span>
                                            <select  class="form-control" name="sex" v-model="profile.sex">
                                                <option value="1">{{ __('Male') }}</option>
                                                <option value="0">{{ __('Famele') }}</option>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="pull-right">
                                                <button class="btn btn-success"> <i class="fa fa-plus" aria-hidden="true"></i> Update</button> 
                                            </div>
                                        </form> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" v-on:click="tranfomer_profile"> <i class="fa fa-eye" aria-hidden="true"></i> View Profile</a>
                            <a class="btn btn-primary" v-on:click="change_password({{ Auth::user()->id }})"> <i class="fa fa-pencil" aria-hidden="true"></i> Change password</a>
                            <a class="btn btn-primary" v-on:click="show_form_edit({{ Auth::user()->id }})"> <i class="fa fa-indent" aria-hidden="true"></i> Edit profile</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>
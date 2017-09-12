<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header col-md-1">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand">
                {{ trans('message.medicine') }} 
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <div class="navbar-left col-md-offset-1 col-md-7">
                <form class=" col-md-7" id="search-form" role="search">
                    <div class="form-group ">
                      <input type="text" class="form-control " placeholder="Search">
                    </div>
                    <a id="search-button" class="btn col-md-1 pull-right"><i class="fa fa-search" aria-hidden="true"></i></a>
                </form>
            </div>
            
             <ul class="nav navbar-nav navbar-right notification ">
                <li class="row user">
                    <div  class="col-md-5"><img src="{{ asset('huonggiang.jpg') }}"></div>
                    <div class="col-md-7 user-name"><a>Viet Toan</a></div>
                </li>
                <!-- <li>
                  <span><i class="fa fa-users fa-lg" aria-hidden="true"></i></span>
                </li>
                <li>
                  <span><i class="fa fa-comments fa-lg" aria-hidden="true"></i></span>
                </li>
                <li>
                  <span><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
                </li> -->
                <li class="dropdown user-setting">
                    <span class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
                    <ul class="menu dropdown-menu">
                        <li><a>{{ trans('message.logout') }}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

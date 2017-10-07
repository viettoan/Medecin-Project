<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/avatar.png') }}" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('home-admin') }}""><i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MANAGER</li>
            <li><a href="{{ route('patient.index') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Patient</span></a></li>
            @if (Auth::user()->permission == 1)
                <li><a href="{{ route('user.index') }}""><i class="fa fa-user" aria-hidden="true"></i> <span>User</span></a></li>
                <li><a href="{{ route('post.index') }}"><i class="fa fa-book"></i> <span>Post</span></a></li>
                <li><a href="{{ route('category.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Category</span></a></li>
                <li><a href="{{ route('specialist.index') }}"><i class="fa fa-mars-double" aria-hidden="true"></i>Specialist</span></a></li>
                <li><a href="{{ route('contact.index') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Contact</span></a></li>
                <li class="header">SETTING</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Video</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Slider</span></a></li>
            @endif
        </ul>
    </section>
</aside>

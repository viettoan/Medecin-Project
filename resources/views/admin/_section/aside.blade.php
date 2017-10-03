<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/avatar.png') }}" class="user-image" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                </ul>
            </li>
            <li><a href="{{ route('user.index') }}""><i class="fa fa-book"></i> <span>User</span></a></li>
            <li><a href="{{ route('patient.index') }}"><i class="fa fa-book"></i> <span>Patient</span></a></li>
            <li><a href="{{ route('post.index') }}"><i class="fa fa-book"></i> <span>Post</span></a></li>
            <li><a href="{{ route('category.index') }}"><i class="fa fa-book"></i> <span>Category</span></a></li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Specialist</span></a></li>
            <li><a href="{{ route('contact.index') }}"><i class="fa fa-book"></i> <span>Contact</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Video</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Slider</span></a></li>
        </ul>
    </section>
</aside>

<div class="sidebar-admin">
    <header>
        <div class="col-md-4">
            <img src="{{ asset('huonggiang.jpg') }}" class="img-responsive img-circle">
        </div>
        <div>
            <h4>Viet Toan</h4>
        </div>
    </header>
    <ul class="list-unstyled">
        <p class="text-center">{{ trans('message.dashboard') }}</p>
        <li>
            <a routerLink="dashboard">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.dashboard') }}
            </a>
        </li>
        <p class="text-center">{{ trans('message.component') }}</p>
        <li>
            <a routerLink="users">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_user') }}
            </a>
        </li>
    </ul>
</div>

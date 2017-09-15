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
            <a href="{{ route('user.index') }}">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_users') }}
            </a>
        </li>
        <li>
            <a href="{{ route('patient.index') }}">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_patients') }}
            </a>
        </li>
        <li>
            <a href="{{ route('contact.index') }}">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_contact') }}
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_category') }}
            </a>
        </li>
        <li>
            <a href="{{ route('post.index') }}">
                <i class="fa fa-dashboard fa-fw"></i>
                {{ trans('message.manage_post') }}
            </a>
        </li>
    </ul>
</div>

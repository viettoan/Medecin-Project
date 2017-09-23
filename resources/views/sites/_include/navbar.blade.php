
<div class="container fixed-navbar">

 <nav class="navbar  fixed-top navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="#"><img src="images/logo.png"  class='img-responsive' alt="" id="logo"></a>

  <div class="collapse navbar-collapse nav-right nav-bar " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item text-center">
        <a class="nav-link" href="/index">TRANG CHỦ</a>
      </li>
      <li class="nav-item text-center">
        <a class="nav-link" href="{{ url('/gioithieu') }}">GIỚI THIỆU</a>
      </li>
      <li class="nav-item text-center">
        <a class="nav-link" href="{{ url('/chuyenkhoa') }}">CHUYÊN KHOA</a>
      </li>
      <li class="nav-item text-center">
        <a class="nav-link" href="{{ url('/chuyenkhoa') }}">TIN TỨC</a>
      </li>
       <li class="nav-item text-center">
        <a class="nav-link" href="lienhe">LIÊN HỆ</a>
      </li>
      @if (Auth::guest())
      <li class="nav-item text-center">
        <a class="nav-link" href="login">ĐĂNG NHẬP</a>
      </li>
      @else
      <li class="nav-item dropdown text-center">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ strtoupper(Auth::user()->name) }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('patient.profile.show', Auth::user()->id) }}">Thông tin tài khoản</a>
          <a class="dropdown-item" href="{{ route('patient.history.show', Auth::user()->id) }}">Lịch sử khám</a>
          <a class="dropdown-item" href="#">Video siêu âm</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              {{ trans('message.logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </li>
      @endif
    </ul>
  </div>
</nav>
</div>

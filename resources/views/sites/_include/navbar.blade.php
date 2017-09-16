
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
       <li class="nav-item text-center">
        <a class="nav-link" href="login">ĐĂNG NHẬP</a>
      </li>
      <li class="nav-item text-center">
        <a class="nav-link" href="{{ route('site.thong-tin-ca-nhan.index') }}">THONG TIN</a>
      </li>
    </ul>
  </div>
</nav>
</div>

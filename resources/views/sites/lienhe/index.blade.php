@extends('sites.master')

@section('content')
  @include('sites._include.navbar')
  @include('sites._include.banner')
  <div class="page-content">
    <iframe id='google-map'
    width="100%"
     height="500px"
     frameborder="0" style="border:0"
     src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAO63kLiZuw39FmCvpLmuTVD-RvtuRtFmU
       &q=Space+Needle,Seattle+WA" allowfullscreen>
   </iframe>
    <div class="container main">
      <div class="row">
        <div class="col-md-8">
          <h5 class='topic-name'>Thông tin và liên hệ</h5>
          <div class="line"></div>
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          @if (session('failed'))
              <div class="alert alert-error">
                  {{ session('failed') }}
              </div>
          @endif
          <form method = "POST" enctype="multipart/form-data" action="{{ route('contact.store') }}">
          {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="formGroupExampleInput">Họ và Tên</label>
                  <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập họ và tên" required value="{{ old('name') }}">
                  @if ($errors->has('name'))
                      <span class="help-block"> 
                           <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="col-sm-6">
                <label for="formGroupExampleInput2">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập số điện thoại" required value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                  <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput2">Email</label>
              <input type="email" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Vui lòng nhập nhập Email" required value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput2">Nội dung</label>
              <textarea type="text" name="content" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung liên hệ của bạn" rows='10' required>{{ old('content') }}</textarea>
              @if ($errors->has('content'))
                <span class="help-block">
                  <strong>{{ $errors->first('content') }}</strong>
                </span>
              @endif
            </div>
            <button type='sumbit' class='btn btn-primary '><i class='fa fa-send'></i>Gửi</button>
         </form>
        </div>

        <div class="col-md-4">
          <div class="col-sm-12">
            <h5 class='topic-name'>Địa chỉ</h5>
            <div class="line"></div>
         </div>

         <ul>
           <li><strong>Điện thoại: </strong>11113232</li>
           <li><strong>Email: </strong>anything@gmail.com</li>
           <li><strong>Website: </strong>This.website</li>
           <li><strong>Địa chỉ: </strong>Chúc Sơn - Chương Mỹ - Hà Nội </li>
         </ul>

        </div>
      </div>
    </div>
    </div>
  </div>

@include('sites._include.footer')
@endsection

@section('style')
  {{ Html::style('css/sites/gioithieu.css') }}
  {{ Html::style('css/sites/_include/navbar.css') }}
  {{ Html::style('css/sites/_include/footer.css') }}
  {{ Html::style('css/sites/_include/banner.css') }}
  {{ Html::style('css/sites/_include/lienhe.css') }}
@endsection

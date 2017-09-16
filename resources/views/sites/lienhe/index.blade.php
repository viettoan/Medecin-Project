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


        <form>
          
          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1"><strong>Họ và tên</strong></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập họ và tên">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputEmail1"><strong>Số điện thoại</strong></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập số điện thoại">
              </div>
            </div>

          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Email</strong></label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập email của bạn">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1"><strong>Nội dung</strong></label>
            <textarea rows='5' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng để lại nội dung liên hệ của bạn"></textarea>
          </div>
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

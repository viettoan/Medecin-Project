@extends('sites.master')
@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
    <div class="container main">
        <div class="row">
          <div class="col-md-12 video">
            <p>Thông tin bệnh nhân</p>
          </div>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td><strong>Mã bệnh nhân</strong></td>
                <td>IMBBM090343434</td>
              </tr>
              <tr>
                <td><strong>Họ tên</strong></td>
                <td>Jamime</td>
              </tr>
              <tr>
                <td><strong>Số điện thoại:</strong></td>
                <td>Jamime</td>
              </tr>
              <tr>
                <td><strong>Số điện thoại:</strong></td>
                <td>0993343434</td>
              </tr>
              <tr>
                <td><strong>Tuổi:</strong></td>
                <td>19</td>
              </tr>
            </tbody>
            </table>
        </div>

        <div class="intro">
          <h2>VIDEO SIÊU ÂM</h2>
          <h5><i class="fa fa-star-o"></i></h5>
        </div>
        <div class="row">
          <div class="col-md-12 video text-center">
              <p>20-6-2016</p>
              <video  controls='controls'>
                <source src="http://sanchoi.net/video/chat.mov">
              </video>
              <br>
              <a class="btn btn-primary" href="http://sanchoi.net/video/chat.mov"><i class="fa fa-download" aria-hidden="true"></i>Tải video</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 video text-center">
              <p>20-6-2016</p>
              <video  controls='controls'>
                <source src="http://sanchoi.net/video/chat.mov">
              </video>
              <br>
              <a class="btn btn-primary" href="http://sanchoi.net/video/chat.mov"><i class="fa fa-download" aria-hidden="true"></i>Tải video</a>
          </div>
        </div>
    </div>
</div>

@include('sites._include.footer')
@endsection

@section('style')
{{ Html::style('css/sites/_include/video.css') }}
{{ Html::style('css/sites/_include/navbar.css') }}
{{ Html::style('css/sites/_include/footer.css') }}
{{ Html::style('css/sites/_include/banner.css') }}
@endsection

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
                <td>{{ $user->id }}</td>
              </tr>
              <tr>
                <td><strong>Họ tên</strong></td>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <td><strong>Ngày sinh:</strong></td>
                <td>21-3-1996</td>
              </tr>
              <tr>
                <td><strong>Tuổi:</strong></td>
                <td>19</td>
              </tr>
              <tr>
                <td><strong>Số điện thoại:</strong></td>
                <td>{{$user->phone}}</td>
              </tr>
            </tbody>
            </table>
        </div>

          <div class="intro">
            <h2>VIDEO SIÊU ÂM</h2>
            <h5><i class="fa fa-star-o"></i></h5>
          </div>
        @foreach($user->histories as $history)
          <div class="row">
            <div class="col-md-12 video text-center">

                <p><a href="#x{{$history->id}}" data-toggle="collapse">{{$history->date_examination}}<i class="fa fa-arrow-down" aria-hidden="true"></i></a></p>
                <div id='x{{$history->id}}' class='collapse'>
                  <div class="history-content panel panel-default">
                    <div class="panel-body">{{$history->content}}</div>
                  </div>
                  <video  controls='controls'>
                    <source src="http://sanchoi.net/{{$history->media->path . $history->media->name . '.' . $history->media->type }}">
                  </video>
                  <br>
                  <a class="btn btn-primary" href="http://sanchoi.net/{{$history->media->path . $history->media->name . '.' . $history->media->type }}"><i class="fa fa-download" aria-hidden="true"></i>Tải video</a>
                </div>
            </div>
          </div>
        @endforeach
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

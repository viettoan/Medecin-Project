@extends('sites.master')
@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
    <div class="container main">
        <div class="intro">
          <h2>VIDEO SIÊU ÂM</h2>
          <h5><i class="fa fa-star-o"></i></h5>
        </div>
        <div class="row">
          <div class="col-md-4 video">
            <p>Thông tin bệnh nhân</p>
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
          <div class="col-md-8" id='parent-player'>
            <video  controls='controls' id='player'>
              <source src="">
            </video>
          </div>
        </div>

          <div class="row">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Ngày khám</th>
                  <th>Video</th>
                  <th>Đang phát</th>
                  <th>Tải về</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->histories as $key => $history)
                <tr>
                  <td>{{$history->date_examination}}</td>
                  <td><a class='a-player' href="#" data-blink="{{ $key }}" data-src="http://sanchoi.net/{{$history->media->path . $history->media->name . '.' . $history->media->type }}">Video {{$key}}</a></td>
                  <td><i id="{{ $key }}" class="{{ $key == 0 ? 'fa fa-play blink' : '' }}"></i></td>
                  <td>
                    <a  data-link="{{$history->media->path . $history->media->name . '.' . $history->media->type }}" class='downloadvideo btn btn-primary'><i class="fa fa-download" aria-hidden="true"></i>Tải về</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>

@include('sites._include.footer')
@endsection
@section('script')
  <script>
    function downloadDataUrlFromJavascript(filename, dataUrl) {

      // Construct the a element
      var link = document.createElement("a");
      link.download = filename;
      link.target = "_blank";

      // Construct the uri
      link.href = dataUrl;
      document.body.appendChild(link);
      link.click();

      // Cleanup the DOM
      document.body.removeChild(link);
      delete link;
  }
    $(document).ready(function() {
      // load video onload
      var link  = $('.a-player').eq(0).attr("data-src")
      $('#player').remove()
      $('#parent-player').append(`
        <video  controls='controls' id='player'>
          <source src='${link}'>
        </video>
      `)

      $('.a-player').click(function(e) {
        e.preventDefault()
        // remove and add new class
        $('.blink').attr('class',"")
        var blink = $(this).data('blink')
        $(`#${blink}`).attr('class', 'fa fa-play blink')
        //change src
        var src= $(this).data('src')
        $('#player').remove()
        $('#parent-player').append(`
          <video  controls='controls' id='player'>
            <source src='${src}'>
          </video>
        `)
      })

      $('.downloadvideo').click(function() {
        downloadDataUrlFromJavascript("sieuam", "http://sanchoi.net/" + $(this).data('link'));
      })
      // $('#player source').attr('src', 'http://sanchoi.net/video/2017/10/20171005-044140-3.mov')
    })
  </script>
@endsection
@section('style')
{{ Html::style('css/sites/_include/video.css') }}
{{ Html::style('css/sites/_include/navbar.css') }}
{{ Html::style('css/sites/_include/footer.css') }}
{{ Html::style('css/sites/_include/banner.css') }}
@endsection

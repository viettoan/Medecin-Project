@extends('sites.master')

@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
    <div class="container main">
        <div class="row">
            <div class="col-md-9 post">
            @if ($intro)
              <h2 class='intro-title'>{!! $intro->title !!}</h2>
              <div class="body-text">
                  {!! $intro->content !!}
              </div>
            @endif        
        </div>
        
       @include('sites._include.mucluc')
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
@endsection

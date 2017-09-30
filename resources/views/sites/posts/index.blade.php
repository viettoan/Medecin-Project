@extends('sites.master')

@section('content')
  @include('sites._include.navbar')
  @include('sites._include.banner')
  <div class="page-content">
    <div class="container main">
       <div class="row">
          <div class="col-md-9">
            @include('sites._include.news')
            <nav aria-label="Page navigation">
                @if (isset($posts))
                    {{ $posts->links() }}
                @endif
            </nav>
          </div>
          <div class="col-md-3">
            @include('sites._include.mucluc')
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
  {{ Html::style('css/sites/_include/news.css') }}
@endsection


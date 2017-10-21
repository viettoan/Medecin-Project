@extends('sites.master')

@section('content')
  @include('sites._include.navbar')
  @include('sites._include.banner')
  <div class="page-content">
    <div class="container main">
       <div class="row">
          <div class="col-md-9">
            <section class="news">
              <div class="container">
                <div class="row">
                <br>
                  <div class="col-sm-12">
                      <h2 class='topic-name'>Tin tức mới nhất</h2>
                      <div class="line"></div>
                   </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                      @if (isset($posts))
                        @foreach ($posts as $post)
                            <div class="row-item row">
                                <div class="col-md-4 col-lg-3">
                                    <a href="detail.html">
                                        <img  class="img-responsive img-post img-thumbnail" src="{{ $post->image }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <h5>{{ $post->title }}</h5>
                                    <small><i class='fa fa-calendar-o'></i><i>{{ $post->created_at }}</i></small>
                                    <p>{{ substr($post->content, 0, 400) }}...</p>
                                    <a class="btn btn-outline-success btn-sm" href="{{ route('page.post.show', ['category' => str_replace(' ', '-', $post->categories->name), 'post_name' => str_replace(' ', '-', $post->title)] ) }}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                <div class="break"></div>

                            </div>
                            <hr>
                        @endforeach
                      @endif
                        <!-- /.row -->
                    </div>
                </div>

              </div>
            </section>
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


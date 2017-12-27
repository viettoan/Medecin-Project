@extends('sites.master')
@section('content')
  @include('sites._include.navbar')
  @include('sites._include.slide')
  @include('sites._include.main-slide')
  @include('sites._include.utility')
  @include('sites._include.video-contact')
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
            @if (isset($postNewest))
                @foreach ($postNewest as $post)
                    <div class="row-item row">
                        <div class="col-md-2 col-lg-2">
                            <a href="{{ route('page.post.show', ['category' => $post->categories->link, 'post_name' => str_replace(' ', '-', $post->title)] ) }}">
                                <img  style="width: 200px; height: 200px;" class="img-responsive img-post img-thumbnail" src="{{ $post->image }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <h5>{{ $post->title }}</h5>
                            <small><i class='fa fa-calendar-o'></i> <i>{{ $post->created_at->format('d/m/Y') }}</i></small>
                            <br>
                            <p>{!! substr($post->content, 0, 400) !!}...</p>
                            <a class="btn btn-outline-success btn-sm" href="{{ route('page.post.show', ['category' => $post->categories->link, 'post_name' => str_replace(' ', '-', $post->title)] ) }}">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
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
  @include('sites._include.footer')
@endsection
@section('style')
 {{ Html::style('css/sites/_include/navbar.css') }}
 {{ Html::style('css/sites/_include/slider.css') }}
 {{ Html::style('css/sites/_include/mainslide.css') }}
 {{ Html::style('css/sites/_include/tienich.css') }}
 {{ Html::style('css/sites/_include/video-contact.css') }}
 {{ Html::style('css/sites/_include/footer.css') }}
@endsection

@section('script')
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    autoplay:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
$('.owl-prev').css('display','none');
$('.owl-next').css('display','none');
</script>
@endsection

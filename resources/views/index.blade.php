@extends('sites.master')
@section('content')
  @include('sites._include.navbar')
  @include('sites._include.slide')
  @include('sites._include.main-slide')
  @include('sites._include.utility')
  @include('sites._include.video-contact')
  @include('sites._include.news')
  @include('sites._include.footer')
@endsection
@section('style')
 {{ Html::style('css/sites/_include/navbar.css') }}
 {{ Html::style('css/sites/_include/slider.css') }}
 {{ Html::style('css/sites/_include/mainslide.css') }}
 {{ Html::style('css/sites/_include/tienich.css') }}
 {{ Html::style('css/sites/_include/video-contact.css') }}
 {{ Html::style('css/sites/_include/news.css') }}
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

@extends('sites.master')
@section('content')
@include('sites._include.navbar')
@include('sites._include.banner')
<div class="page-content">
   <div class="container main">
      <div class="container">
         <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
            <div class="col-md-4"></div>
            <div class='container-fluid' >
                <div class="">
                     <div class="owl-carousel owl-theme">
                        @foreach($specicals as $specical)
                            <div class="item">
                                <div class="img__wrap">
                                <a href="{{ route('chitiet', ['id' => $specical->id]) }}">
                                     <img class="img__img" src="{{ $specical->image }}" />
                                    <p class='img_heading'>{{ $specical->name }}</p>
                                    <div class="blur-image">
                                        <p class="img__description">
                                            {{ $specical->description }}
                                        </p>
                                    </div>
                                </a>
                                </div> 
                            </div>
                        @endforeach
                     </div>
                </div>
            </div>
            {{ $specicals->links() }}
               <!-- Categories Widget -->
               @include('sites._include.mucluc')
            </div>
         </div>
         <!-- /.row -->
      </div>
   </div>
</div>
@include('sites._include.footer')
@endsection
@section('style')
{{-- {{ Html::style('css/sites/gioithieu.css') }} --}}
{{ Html::style('css/sites/_include/navbar.css') }}
{{ Html::style('css/sites/_include/footer.css') }}
{{ Html::style('css/sites/_include/banner.css') }}
{{ Html::style('css/sites/_include/post.css') }}
@endsection

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
               <!-- Title -->
               <h3 class="mt-4">{{ $special->name }}</h3>
               <hr>
               <!-- Preview Image -->
               <img class="img-fluid rounded" src="{{ $special->image }}" alt="">
               <hr>
               <!-- Post Content -->
               <p style="font-size: bold; font-weight: bold;">{!! $special->description !!}</p>
               <hr>
               <p class="lead">{!! $special->content !!}</p>
               <hr>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
               <!-- Side Widget -->
               <div class="card my-4">
                  <h6 class="card-header related-post">Chuyên Khoa</h6>
                  <div class="card-body">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           @foreach ($allspecal as $item)
                           <!-- item -->
                           <div class="row" style="margin-top: 10px;">
                              <div class="col-md-5">
                                 <a href="{{ route('chitiet', ['id' => $item->id ]) }}">
                                 <img class="img-responsive" style="height: 75px; width: 120px;" src="{{$item->image }}" alt="">
                                 </a>
                              </div>
                              <div class="col-md-7 ">
                                 <a class='title-related-post' href="{{ route('chitiet', ['id' => $item->id ]) }}">
                                    <p style="font-weight: bold;">
                                       {{ $item->name }}      
                                    </p>
                                 </a>
                              </div>
                              <div class="break"></div>
                           </div>
                           <!-- end item -->
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
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

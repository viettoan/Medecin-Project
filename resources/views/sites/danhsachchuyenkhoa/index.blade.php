@extends('sites.master')

@section('content')
  @include('sites._include.navbar')
  <div class="banner">
   <div class="breadcrumb">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h4 class='title'><strong> <a href="{{ url('/gioithieu') }}"> Giới Thiệu</a></strong></h4>
               <ul>
                  <li><i class="fa fa-long-arrow-right"></i>Phòng khám</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
  <div class="page-content">
    <div class="container main">
       <div class="row">
          <div class="col-md-9">
            <section class="news">
              <div class="container">
                <div class="row">
                <br>
                  <div class="col-sm-12">
                      <h2 class='topic-name'>Danh Sách Chuyên Khoa</h2>
                      <div class="line"></div>
                   </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                      @if (isset($specicals))
                        @foreach ($specicals as $specical)
                            <div class="row-item row">
                                <div class="col-md-4 col-lg-3">
                                    <a href="{{ route('chitiet', ['id' => $specical->id]) }}">
                                        <img  class="img-responsive img-thumbnail" src="{{ $specical->image }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <h5>{{ $specical->name }}</h5>
                                    <small><i class='fa fa-calendar-o'></i> <i>{{ $specical->created_at->format('d/m/Y') }}</i></small>
                                    <p>{!! substr($specical->description, 0, 400) !!}...</p>
                                    <a class="btn btn-outline-success btn-sm" href="">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
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
                @if (isset($specicals))
                    {{ $specicals->links() }}
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


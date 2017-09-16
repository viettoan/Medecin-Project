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
          <h3 class="mt-4">Sản phụ khoa</h3>
          <hr>

          <!-- Date/Time -->
          <p class='day-posted'>
            <small><i class='fa fa-calendar'>&nbsp;</i>Posted on January 1, 2017 at 12:00 PM</small>
          </p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="images/post/banner.jpg" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

          <hr>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">


          <!-- Side Widget -->
          <div class="card my-4">
            <h6 class="card-header related-post">Các bài viết mới</h6>
            <div class="card-body">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" width="100%" height='100%' src="images/post/banner.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-7 ">
                                <a class='title-related-post' href="#">Cựu điệp viên Edward Snowden bày tỏ quan điểm về tính năng FaceID trên iPhoneX</a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" width="100%"   height='100%' src="images/post/banner.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a class='title-related-post' href="#">Cựu điệp viên Edward Snowden bày tỏ quan điểm về tính năng FaceID trên iPhoneX</a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" width="100%"  height='100%' src="images/post/banner.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a class='title-related-post' href="#">Cựu điệp viên Edward Snowden bày tỏ quan điểm về tính năng FaceID trên iPhoneX</a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="detail.html">
                                    <img class="img-responsive" width="100%" height='100%' src="images/post/banner.jpg" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a class='title-related-post' href="#">Cựu điệp viên Edward Snowden bày tỏ quan điểm về tính năng FaceID trên iPhoneX</a>
                            </div>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    </div>
                </div>
            </div>
          </div>


          <!-- Categories Widget -->
          @include('sites._include.mucluc')
          {{-- <div class="card my-4">
            <h5 class="card-header related-post">Chuyên mục</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}


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

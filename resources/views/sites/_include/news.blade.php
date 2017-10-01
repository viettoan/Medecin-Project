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
                        <a class="btn btn-outline-success btn-sm" href="detail.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>

                </div>
                <hr>
            @endforeach
            <!-- /.row -->
        </div>
    </div>

  </div>
</section>


    <div class="containter-fluid">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @for ($i = 0; $i < count($sliders); $i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="0" @if ($i == 0) class="active" @endif ></li>
          @endfor
        </ol>
        <div class="carousel-inner" role="listbox">
          @for ($i = 0; $i < count($sliders); $i++)
            <div class="carousel-item @if ($i == 0) active @endif ">
              <img class="d-block img-fluid slide-header" src="{{ asset(config('custom.media.sliders.defaultPath') . $sliders[$i]->path) }}" alt="First slide"  >
            </div>
          @endfor
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>



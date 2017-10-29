<div class='container-fluid' >
    <div class="main-slide">
        <h2 class="text-center">CHUYÊN KHOA UY TÍN</h2>
         <div class="owl-carousel owl-theme">
            @foreach( $specicals as $specical)
            <div class="item">
                <div class="img__wrap">
                  <img class="img__img" src="{{ $specical->image }}" />
                  <p class='img_heading'>{{ $specical->name }}</p>
                    <div class="blur-image">
                        <p class="img__description">
                            {{ $specical->description }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
         </div>
    </div>
</div>
<script>
</script>

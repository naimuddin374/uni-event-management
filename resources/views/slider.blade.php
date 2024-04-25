<!-- slider_area_start -->
<div class="slider_area">
  <div class="slider_active owl-carousel">
    <!-- single_carouse -->
    @foreach($slides as $slide)
    <div class="single_slider  d-flex align-items-center"
      style="background-image: url({{ asset($slide->image); }})">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="slider_text">
              <h3
                style="color: #fff; white-space: normal; width: 50%; font-size: 40px; text-shadow: 0px 0px 30px black">
                {{ nl2br($slide->title); }}
              </h3>
              <!-- Boost up your skills with a new way of learning. -->
              <!-- <a href="#" class="boxed-btn3">Get Start</a>
              <a href="#" class="boxed-btn4">Take a tour</a> -->
              @if($slide->url)
              <a href="{{ $slide->url }}" class="boxed-btn3">Take a tour</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ single_carouse -->
    @endforeach
    <!-- single_carouse -->
    <!-- <div class="single_slider  d-flex align-items-center slider_bg_2">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="slider_text ">
              <h3>Boost up your skills <br>
                with a new way of <br>
                learning.</h3>
              <a href="#" class="boxed-btn3">Get Start</a>
              <a href="#" class="boxed-btn4">Take a tour</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!--/ single_carouse -->
  </div>
</div>
<!-- slider_area_end -->
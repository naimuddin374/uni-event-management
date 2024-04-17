@extends('layouts.main')
@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>Recent Events</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bradcam_area_end  -->
<!-- popular_program_area_start  -->
<div class="popular_program_area mt-5">
  <div class="container">
    <div class="row">
      @foreach($events as $event)
      <div class="col-lg-4 col-md-6">
        <div class="single__program">
          <div class="program_thumb">
            @if($event->image)
            <img src="{{ asset($event->image) }}" alt='event' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='event' />
            @endif
          </div>
          <div class="program__content">
            <span>{{ $event->location; }}</span>
            <h4>{{ $event->title }}</h4>
            <p>{{ substr($event->description, 0, 100) }}</p>
            <a href="{{ url('/events/'.$event->id) }}" class="boxed-btn5">Show
              Details</a>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-lg-4 col-md-6">
        <div class="single__program">
          <div class="program_thumb">
            <img src="img/program/2.png" alt="">
          </div>
          <div class="program__content">
            <span>Agriculture</span>
            <h4>Mechanical engneering</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut</p>
            <a href="#" class="boxed-btn5">Show Details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single__program">
          <div class="program_thumb">
            <img src="img/program/3.png" alt="">
          </div>
          <div class="program__content">
            <span>Agriculture</span>
            <h4>Bio engneering</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              do eiusmod tempor incididunt ut</p>
            <a href="#" class="boxed-btn5">Show Details</a>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-lg-12">
        <div class="course_all_btn text-center">
          <a href="Courses.html" class="boxed-btn4">View All course</a>
        </div>
      </div>
    </div> -->
  </div>
</div>
<!-- popular_program_area_end -->
@endsection
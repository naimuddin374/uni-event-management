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
      @foreach($events as $element)
      <div class="col-lg-4 col-md-6">
        <div class="single__program">
          <div class="program_thumb">
            @if($element->image)
            <img src="{{ asset($element->image) }}" alt='event' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='event' />
            @endif
          </div>
          <div class="program__content">
            <span>{{ $element->location; }}</span>
            <h4>{{ $element->title }}</h4>
            <p>{{ substr($element->description, 0, 100) }}</p>
            <a href="{{ url('/events/'.$element->id) }}" class="boxed-btn5">Show
              Details</a>
          </div>
        </div>
      </div>
      @endforeach

      <!-- <div class="row">
      <div class="col-lg-12">
        <div class="course_all_btn text-center">
          <a href="Courses.html" class="boxed-btn4">View All course</a>
        </div>
      </div>
    </div> -->

    </div>
    <!-- Add pagination here -->
    <div class="row">
      <div class="col-lg-12 text-center">
        {{ $events->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
  <!-- popular_program_area_end -->
  @endsection
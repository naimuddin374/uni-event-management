@extends('layouts.main')
@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>Recent Blogs</h3>
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
      @foreach($blogs as $element)
      <div class="col-lg-4 col-md-6">
        <div class="single__program">
          <div class="program_thumb">
            @if($element->image)
            <img src="{{ asset($element->image) }}" alt='blog' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='blog' />
            @endif
          </div>
          <div class="program__content">
            <span>{{ $element->location; }}</span>
            <h4>{{ $element->title }}</h4>
            <a href="{{ url('/blogs/'.$element->id) }}" class="boxed-btn5">Show
              Details</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- popular_program_area_end -->
  @endsection
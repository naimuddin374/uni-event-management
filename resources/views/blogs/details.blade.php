@extends('layouts.main')
@section('content')

<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>Blog details</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bradcam_area_end  -->

<div class="event_details_area section__padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="single_event d-flex align-items-center">
          <div class="thumb">
            @if($blog->image)
            <img src="{{ asset($blog->image) }}" alt='event' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='event' />
            @endif
            <div class="date text-center">
              <h4>{{date('d', strtotime($blog->created_at)) }}</h4>
            </div>
          </div>
          <div class="event_details_info">
            <div class="event_info">
              <h4>{{ $blog->title }}</h4>
              <p><span> <i class="flaticon-clock"></i>
                  {{date('h:i a', strtotime($blog->event_time)) }}
                </span>
                <span> <i
                    class="flaticon-calendar"></i>{{date('d F Y', strtotime($blog->event_time)) }}
                </span>
                <!-- <span> <i class="flaticon-placeholder"></i>
                  {{ $blog->location }}</span> -->
              </p>
            </div>
            <p class="event_info_text">{{ $blog->description }}</p>
            <!-- <a href="#" class="boxed-btn3">Book a seat</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
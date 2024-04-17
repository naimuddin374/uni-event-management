@extends('layouts.main')
@section('content')

<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>event details</h3>
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
            @if($event->image)
            <img src="{{ asset($event->image) }}" alt='event' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='event' />
            @endif
            <div class="date text-center">
              <h4>{{date('d', strtotime($event->event_time)) }}</h4>
              <span>{{date('F, Y', strtotime($event->event_time)) }}</span>
            </div>
          </div>
          <div class="event_details_info">
            <div class="event_info">
              <h4>{{ $event->title }}</h4>
              <p><span> <i class="flaticon-clock"></i>
                  {{date('h:i a', strtotime($event->event_time)) }}
                </span>
                <span> <i
                    class="flaticon-calendar"></i>{{date('d F Y', strtotime($event->event_time)) }}
                </span>
                <span> <i class="flaticon-placeholder"></i>
                  {{ $event->location }}</span>
              </p>
            </div>
            <p class="event_info_text">{{ $event->description }}</p>
            <!-- <a href="#" class="boxed-btn3">Book a seat</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.main')
@section('content')

<!-- slider_area_start -->
@include('slider')
<!-- slider_area_end -->

<!-- popular_program_area_start  -->
<div class="popular_program_area mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section_title text-center">
          <h3>Recent Events</h3>
        </div>
      </div>
    </div>
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
      aria-labelledby="nav-home-tab">
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
              <h4>{{date('d F Y', strtotime($event->event_time)) }}</h4>
              <p style="height: 50px">{{$event->title}}</p>
              <a href="{{ url('/events/'.$event->id) }}" class="boxed-btn5">View
                More</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="course_all_btn text-center">
        <a href="{{url('/events')}}" class="boxed-btn4">View All Events</a>
      </div>
    </div>
  </div>
</div>
<!-- popular_program_area_end -->

<!-- recent_news_area_start  -->
<div class="recent_news_area mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section_title text-center mb-70">
          <h3 class="mb-45">Recent Blog</h3>
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($blogs as $blog)
      <div class="col-md-6">
        <div class="single__news">
          <div class="thumb">
            <a href="{{ url('/blogs/'.$blog->id) }}">
              @if($blog->image)
              <img src="{{ asset($blog->image) }}" alt='blog' />
              @else
              <img src="{{ asset('img/placeholder.png') }}" alt='blog' />
              @endif
            </a>
            <span class="badge">New</span>
          </div>
          <div class="news_info">
            <a href="{{ url('/blogs/'.$blog->id) }}">
              <h4>{{$blog->title}}</h4>
            </a>
            <p class="d-flex align-items-center"> <span><i
                  class="flaticon-calendar-1"></i>
                {{date('d F Y', strtotime($blog->created_at)) }}</span>

              <!-- <span> <i class="flaticon-comment"></i> 01 comments</span> -->
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- recent_news_area_end  -->
@endsection
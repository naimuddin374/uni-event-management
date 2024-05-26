@extends('layouts.main')
@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="bradcam_text">
          <h3>Our Members</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bradcam_area_end  -->

<!-- recent_event_area_strat  -->
<div class="recent_event_area mt-5 pt-5">
  <div class="container">
    @foreach($membersByType as $type => $members)
    <h2 class="member-type">{{ $type }}</h2>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        @foreach($members as $element)
        <div class="single_event d-flex align-items-center">
          <div class="member-image">
            @if($element->image)
            <img src="{{ asset($element->image) }}" alt='member' />
            @else
            <img src="{{ asset('img/placeholder.png') }}" alt='member' />
            @endif
          </div>
          <div class="event_info member_info">
            <a href="#">
              <h4>{{ $element->name }}</h4>
            </a>
            <p> <span>{{ $element->member_type }},
                {{ $element->session }}</span></p>
            <p>
              <span>{{ $element->student_id }}, {{ $element->email }},
                {{ $element->phone }}, {{ $element->social_link }}</span>
            </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endforeach


  </div>
  <!-- recent_event_area_end  -->
  @endsection
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
    <div class="accordion" id="accordionExample">
      @foreach($members->groupBy('session') as $session => $sessionMembers)
      @php
      $uniqueId = str_replace(' ', '-', $type) . '-' . $session;
      @endphp
      <div class="card">
        <div class="card-header" id="heading{{ $uniqueId }}">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button"
              data-toggle="collapse" data-target="#collapse{{ $uniqueId }}"
              aria-expanded="true" aria-controls="collapse{{ $uniqueId }}">
              {{ $session }}
            </button>
          </h2>
        </div>
        <div id="collapse{{ $uniqueId }}" class="collapse"
          aria-labelledby="heading{{ $uniqueId }}"
          data-parent="#accordionExample">
          <div class="card-body">
            @foreach($sessionMembers as $element)
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
      </div>
      @endforeach
    </div>
    @endforeach
  </div>
</div>
<!-- recent_event_area_end  -->

@endsection

@section('styles')
<style>
.accordion .card-header {
  cursor: pointer;
}
</style>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  $('.collapse').collapse();
});
</script>
@endsection
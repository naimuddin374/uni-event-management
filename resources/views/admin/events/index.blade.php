@extends('layouts.main')

@section('content')
<div class="container">
  <div class="py-4 d-flex align-items-center justify-content-between">
    <h1>Events List</h1>
    <a href="{{ route('admin.events.create') }}"
      class="btn btn-primary mb-3">Add
      New Event</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Event Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($events as $element)
      <tr>
        <td>#{{ $element->id }}</td>
        <td>
          @if($element->image)
          <img src="{{ asset($element->image) }}" alt='event' height="80"
            weight="80" />
          @else
          <img src="{{ asset('img/placeholder.png') }}" alt='event' height="80"
            weight="80" />
          @endif
        </td>
        <td>{{ $element->title }}</td>
        <td>{{ $element->description }}</td>
        <td>{{ $element->event_time }}</td>
        <td>{{ $element->status }}</td>
        <td>
          <a href="{{ route('admin.events.edit', $element->id) }}"
            class="btn btn-info">Edit</a>
          <form action="{{ route('admin.events.destroy', $element->id) }}"
            method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
              onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
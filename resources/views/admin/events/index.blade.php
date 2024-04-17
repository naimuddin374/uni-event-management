@extends('layouts.main')

@section('content')
<div class="container">
  <h1>Events List</h1>
  <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Add
    New Event</a>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Event Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr>
        <td>
          @if($event->image)
          <img src="{{ asset($event->image) }}" alt='event' height="80"
            weight="80" />
          @else
          <img src="{{ asset('img/placeholder.png') }}" alt='event' height="80"
            weight="80" />
          @endif
        </td>
        <td>{{ $event->id }}</td>
        <td>{{ $event->title }}</td>
        <td>{{ $event->description }}</td>
        <td>{{ $event->event_time }}</td>
        <td>{{ $event->status }}</td>
        <td>
          <a href="{{ route('admin.events.edit', $event->id) }}"
            class="btn btn-info">Edit</a>
          <form action="{{ route('admin.events.destroy', $event->id) }}"
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
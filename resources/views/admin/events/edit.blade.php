@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Edit Event</h1>
  <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($errors->any())
      <div class="alert alert-danger">
          <p><strong>Opps Something went wrong</strong></p>
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          </ul>
      </div>
    @endif 
    
    
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title"
        value="{{ $event->title }}" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description"
        rows="3">{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="event_time">Date & Time:</label>
      <input type="datetime-local" class="form-control" id="event_time"
        name="event_time" value="{{ $event->event_time }}" required>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name="status"
        value="{{ $event->status }}">
        <option value="active"
          {{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive"
          {{ $event->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
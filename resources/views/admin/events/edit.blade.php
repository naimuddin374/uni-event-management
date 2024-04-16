@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Event Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="event_time">Event Time:</label>
            <input type="datetime-local" class="form-control" id="event_time" name="event_time" value="{{ $event->event_time }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" value="{{ $event->status }}">
                <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $event->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
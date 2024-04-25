@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Add New Event</h1>
  <form action="{{ route('admin.slides.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="serial">Serial:</label>
      <input type="number" class="form-control" id="serial" name="serial"
        required>
    </div>
    <div class="form-group">
      <label for="url">Action URL:</label>
      <input type="text" class="form-control" id="url" name="url">
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection
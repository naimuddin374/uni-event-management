@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Edit Slide</h1>
  <form action="{{ route('admin.slides.update', $slide->id) }}" method="POST"
    enctype="multipart/form-data">
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
        value="{{ $slide->title }}" required>
    </div>
    <div class="form-group">
      <label for="serial">Serial:</label>
      <input type="text" class="form-control" id="serial" name="serial"
        value="{{ $slide->serial }}" required>
    </div>
    <div class="form-group">
      <label for="url">Action URL:</label>
      <input type="text" class="form-control" id="url" name="url"
        value="{{ $slide->url }}">
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
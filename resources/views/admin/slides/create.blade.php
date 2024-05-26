@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Add New</h1>
  <form action="{{ route('admin.slides.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf

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
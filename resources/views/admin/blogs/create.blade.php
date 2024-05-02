@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Add New</h1>
  <form action="{{ route('admin.blogs.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description"
        rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection
@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Edit Blog</h1>
  <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title"
        value="{{ $blog->title }}" required>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description"
        rows="3">{{ $blog->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name="status"
        value="{{ $blog->status }}">
        <option value="active"
          {{ $blog->status == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive"
          {{ $blog->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
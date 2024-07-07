@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Add New Souvenir</h1>
  <form action="{{ route('admin.souvenirs.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf

    @if($errors->any())
    <div class="alert alert-danger">
      <p><strong>Oops Something went wrong</strong></p>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="form-group">
      <label for="pdf">PDF:</label>
      <input type="file" class="form-control" id="pdf" name="pdf" required>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection
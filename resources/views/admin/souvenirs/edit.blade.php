@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Edit Souvenir</h1>
  <form action="{{ route('admin.souvenirs.update', $souvenir->id) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
      <input type="text" class="form-control" id="name" name="name"
        value="{{ $souvenir->name }}" required>
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date"
        value="{{ $souvenir->date }}" required>
    </div>
    <div class="form-group">
      <label for="pdf">PDF:</label>
      <input type="file" class="form-control" id="pdf" name="pdf">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
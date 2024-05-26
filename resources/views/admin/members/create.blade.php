@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Add New</h1>
  <form action="{{ route('admin.members.store') }}" method="POST"
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
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="student_id">Student ID:</label>
      <input type="text" class="form-control" id="student_id" name="student_id"
        required>
    </div>
    <div class="form-group">
      <label for="session">Session:</label>
      <input type="text" class="form-control" id="session" name="session"
        required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
      <label for="social_link">Social Link:</label>
      <input type="url" class="form-control" id="social_link"
        name="social_link">
    </div>
    <div class="form-group">
      <label for="member_type">Member Type</label>
      <select name="member_type" id="member_type" class="form-control">
        @foreach(App\Enums\MemberType::cases() as $type)
        <option value="{{ $type->value }}">{{ $type->value }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
  </form>
</div>
@endsection
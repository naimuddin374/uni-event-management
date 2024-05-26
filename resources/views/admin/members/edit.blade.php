@extends('layouts.main')

@section('content')
<div class="container my-4">
  <h1>Edit Member</h1>
  <form action="{{ route('admin.members.update', $member->id) }}" method="POST"
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
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name"
        value="{{ $member->name }}" required>
    </div>
    <div class="form-group">
      <label for="student_id">Student ID:</label>
      <input type="text" class="form-control" id="student_id" name="student_id"
        value="{{ $member->student_id }}" required>
    </div>
    <div class="form-group">
      <label for="session">Session:</label>
      <input type="text" class="form-control" id="session" name="session"
        value="{{ $member->session }}" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email"
        value="{{ $member->email }}" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" name="phone"
        value="{{ $member->phone }}" required>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="form-group">
      <label for="social_link">Social Link:</label>
      <input type="url" class="form-control" id="social_link" name="social_link"
        value="{{ $member->social_link }}">
    </div>
    <div class="form-group">
      <label for="member_type">Member Type</label>
      <select name="member_type" id="member_type" class="form-control">
        @foreach(App\Enums\MemberType::cases() as $type)
        <option value="{{ $type->value }}"
          {{ $member->member_type === $type->value ? 'selected' : '' }}>
          {{ $type->value }}
        </option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
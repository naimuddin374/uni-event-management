@extends('layouts.main')

@section('content')
<div class="container">
  <div class="py-4 d-flex align-items-center justify-content-between">
    <h1>Members List</h1>
    <a href="{{ route('admin.members.create') }}"
      class="btn btn-primary mb-3">Add New</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Student ID</th>
        <th>Session</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($members as $member)
      <tr>
        <td>#{{ $member->id }}</td>
        <td>
          @if($member->image)
          <img src="{{ asset($member->image) }}" alt='member' height="80"
            width="80" />
          @else
          <img src="{{ asset('img/placeholder.png') }}" alt='member' height="80"
            width="80" />
          @endif
        </td>
        <td>{{ $member->name }}</td>
        <td>{{ $member->member_type }}</td>
        <td>{{ $member->student_id }}</td>
        <td>{{ $member->session }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->phone }}</td>
        <td>
          <a href="{{ route('admin.members.edit', $member->id) }}"
            class="btn btn-info">Edit</a>
          <form action="{{ route('admin.members.destroy', $member->id) }}"
            method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
              onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
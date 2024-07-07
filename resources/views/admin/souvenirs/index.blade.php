@extends('layouts.main')

@section('content')
<div class="container">
  <div class="py-4 d-flex align-items-center justify-content-between">
    <h1>Souvenirs List</h1>
    <a href="{{ route('admin.souvenirs.create') }}"
      class="btn btn-primary mb-3">Add New</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>PDF</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($souvenirs as $souvenir)
      <tr>
        <td>#{{ $souvenir->id }}</td>
        <td>{{ $souvenir->name }}</td>
        <td>{{ $souvenir->date }}</td>
        <td><a href="{{ asset($souvenir->pdf) }}" target="_blank">Download
            PDF</a></td>
        <td>
          <a href="{{ route('admin.souvenirs.edit', $souvenir->id) }}"
            class="btn btn-info">Edit</a>
          <form action="{{ route('admin.souvenirs.destroy', $souvenir->id) }}"
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
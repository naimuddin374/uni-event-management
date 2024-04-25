@extends('layouts.main')

@section('content')
<div class="container">
  <div class="py-4 d-flex align-items-center justify-content-between">
    <h1>Slide List</h1>
    <a href="{{ route('admin.slides.create') }}"
      class="btn btn-primary mb-3">Add
      New Slide</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Serial</th>
        <th>Image</th>
        <th>Title</th>
        <th>Action URL</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($slides as $element)
      <tr>
        <td>{{ $element->serial }}</td>
        <td>
          @if($element->image)
          <img src="{{ asset($element->image) }}" alt='element' height="80"
            weight="80" />
          @else
          <img src="{{ asset('img/placeholder.png') }}" alt='element'
            height="80" weight="80" />
          @endif
        </td>
        <td>{{ $element->title }}</td>
        <td>{{ $element->url }}</td>
        <td>
          <a href="{{ route('admin.slides.edit', $element->id) }}"
            class="btn btn-info">Edit</a>
          <form action="{{ route('admin.slides.destroy', $element->id) }}"
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
@extends('layouts.main')

@section('content')
<div class="container my-5">
  <div class="section_title text-center mb-5">
    <h3>Souvenirs</h3>
  </div>
  <div class="row text-center">
    @foreach($souvenirs as $souvenir)
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="souvenir-item">
        <img src="{{ asset('img/pdf-icon.png') }}" alt="{{ $souvenir->name }}"
          class="img-fluid pdf-icon">
        <h4>{{ $souvenir->name }}</h4>
        <p>
          {{date('d F Y', strtotime($souvenir->date)) }}
        </p>
        <a href="{{ asset($souvenir->pdf) }}" class="btn btn-primary" download>
          <i class="fas fa-file-pdf"></i> Read More
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@section('styles')
<style>
.souvenir-item {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.souvenir-item:hover {
  transform: scale(1.05);
}

.souvenir-item img {
  width: 100px;
  height: 100px;
  margin-bottom: 15px;
}

.souvenir-item h4 {
  font-size: 18px;
  margin-bottom: 10px;
}

.souvenir-item p {
  font-size: 14px;
  color: #555;
  margin-bottom: 15px;
}

.souvenir-item .btn {
  font-size: 14px;
}
</style>
@endsection
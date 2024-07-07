@extends('layouts.main')

@section('content')
<div class="login-container">
  <img src="{{ asset('img/cec.jpg') }}" alt="CEC Logo" width="100">
  <h1>Login</h1>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn">Log in</button>
  </form>
  <div class="links">
    <a href="{{ route('password.request') }}">Forgot your password?</a>
  </div>
</div>
@endsection

@section('styles')
<style>
body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f4f4;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.login-container {
  background: #fff;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  text-align: center;
  margin: 100px auto;
}

.login-container img {
  margin-bottom: 20px;
}

.login-container h1 {
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
  text-align: left;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-group input {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group input[type="checkbox"] {
  width: auto;
  margin-right: 10px;
}

.btn {
  width: 100%;
  padding: 10px;
  background-color: #007BFF;
  border: none;
  border-radius: 4px;
  color: white;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
}

.btn:hover {
  background-color: #0056b3;
}

.links {
  margin-top: 20px;
}

.links a {
  color: #007BFF;
  text-decoration: none;
}

.links a:hover {
  text-decoration: underline;
}
</style>
@endsection
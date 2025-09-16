@extends('layout')
@section('content')
<x-navbar/>

<section class="modal-body login-section">
    <div class="login-container">
      <h2>Welcome Back</h2>
      <p class="login-subtitle">Please login to your account</p>
      <form action={{ route('userLogin') }} method="POST" class="login-form">
        @csrf
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
          @error('email') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
  
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password">
          @error('password') <small class="error text-danger">{{ $message }}</small> @enderror
        </div>
  
        <button type="submit" class="login-btn">Login</button>
  
      </form>
        <div class="extra-links">
          <a href="{{ route('register') }}">Create Account</a>

        </div>
    </div>
  </section>
  <x-footer/>
  @endsection
@extends('layouts.auth')

@section('title', 'Login - SIPETO')

@section('content')

{{-- Header biru Polinema --}}
<div class="login-header" style="background-color: #0d295b; padding: 10px 20px;">
    <div class="d-flex align-items-center">
      <!-- Logo 1 -->
      <img src="{{ asset('img/Logo Polinema.png') }}" alt="Logo Polinema" style="height: 60px; margin-right: 10px;">
      <!-- Logo 2 -->
      <img src="{{ asset('img/logo.png') }}" alt="Logo TOEIC" style="height: 60px; margin-right: 10px;">
      <!-- Teks SIPETO -->
      <div>
        <h1 style="font-size: 18px; margin: 0; color: #fff; font-weight: bold;">SIPETO</h1>
        <p style="font-size: 14px; margin: 0; color: #fff;">Sistem Pendaftaran TOEIC</p>
      </div>
    </div>
  </div>
  
  

{{-- Kotak login --}}
<div class="login-box">
  <div class="card" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
    
    <div class="card-body pt-4 px-4">
      <h2 class="text-center mb-4" style="font-size: 20px; color: #1c2b50; font-weight: bold;">Masuk ke Akun Anda</h2>

      <form action="{{ url('/Login') }}" method="POST">
        @csrf

        {{-- Username --}}
        <div class="form-group mb-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                <i class="fas fa-user text-muted"></i>
              </span>
            </div>
            <input type="text" name="username" class="form-control border-start-0" placeholder="Username" required
              style="border-radius: 0 10px 10px 0; height: 45px;">
          </div>
        </div>

        {{-- Password --}}
        <div class="form-group mb-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                <i class="fas fa-lock text-muted"></i>
              </span>
            </div>
            <input type="password" name="password" class="form-control border-start-0" placeholder="Password" required
              style="border-radius: 0 10px 10px 0; height: 45px;">
          </div>
        </div>

        {{-- Ingat Saya dan Lupa Password --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember">
            <label class="form-check-label" for="remember" style="font-size: 14px;">Ingat Saya</label>
          </div>
          <a href="#" style="font-size: 14px; color: #1c2b50;">Lupa Password?</a>
        </div>

        {{-- Tombol Login --}}
        <button type="submit" class="btn btn-primary btn-block"
          style="height: 45px; border-radius: 10px; background-color: #1c2b50; border: none;">
          Login
        </button>
        {{-- Hanya tampil jika admin --}}
@if(isset($isAdmin) && $isAdmin)
<div class="text-center mt-3">
  <span style="font-size: 14px;">Belum punya akun? <a href="{{ route('admin.register') }}" style="color: #1c2b50;">Daftar</a></span>
</div>
@endif
      </form>
    </div>
  </div>
</div>

{{-- Style --}}
<style>
  .login-header {
    width: 100%;
    background-color: #0d295b;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1000;
  }

  .login-box {
    width: 360px;
    margin: 130px auto 0 auto;
  }

  .form-control:focus {
    border-color: #1c2b50;
    box-shadow: 0 0 0 0.2rem rgba(28, 43, 80, 0.25);
  }

  .input-group-text {
    background-color: transparent;
    border-right: 0;
    padding-left: 14px;
    padding-right: 14px;
  }

  .form-control::placeholder {
    font-size: 14px;
    color: #aaa;
  }

  .btn-primary:hover {
    background-color: #0d295b;
  }
</style>

@endsection

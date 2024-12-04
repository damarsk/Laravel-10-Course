@extends('layouts.nhf-app')

@section('title', 'Login - Damar\'s Blog')

@section('content')
<div style="height: 100vh;" class="row justify-content-center align-items-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <a href="{{ url('/') }}" class="d-inline-block p-2 text-center" style="width: 40px; height: 40px;">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h4 class="card-title text-center mb-4">Login</h4>

                @if ($errors->has('login_gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('login_gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ url('proses_login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ url('forgot-password') }}" class="text-decoration-none">Forgot Password?</a>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">Don't have an account? <a href="{{ url('register') }}"
                                class="text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
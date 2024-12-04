@extends('layouts.nhf-app')

@section('title', 'Forgot Password - Damar\'s Blog')

@section('content')
<div style="height: 100vh;" class="row justify-content-center align-items-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4">Forgot Password</h4>

                <!-- Alert untuk pesan sukses/error -->
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">Back to <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
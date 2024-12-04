@extends('layouts.nhf-app')
@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div style="height: 100vh;" class="row justify-content-center align-items-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow-lg border-0 rounded-lg my-3">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form action="{{ route('proses_register') }}" method="POST" id="regForm">
                                    @csrf
                                    <!-- Nama -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Nama</label>
                                        <input class="form-control py-3 @error('name') is-invalid @enderror" 
                                               id="inputFirstName" 
                                               type="text" 
                                               name="name" 
                                               placeholder="Masukkan Nama" 
                                               value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Username -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputusername">Username</label>
                                        <input class="form-control py-3 @error('username') is-invalid @enderror" 
                                               id="inputusername" 
                                               type="text" 
                                               name="username" 
                                               placeholder="Masukkan Username" 
                                               value="{{ old('username') }}" />
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-3 @error('email') is-invalid @enderror" 
                                               id="inputEmailAddress" 
                                               type="email" 
                                               name="email" 
                                               placeholder="Masukkan Email" 
                                               value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-3 @error('password') is-invalid @enderror" 
                                               id="inputPassword" 
                                               type="password" 
                                               name="password" 
                                               placeholder="Masukkan Password" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="form-group mt-4 mb-0">
                                        <button class="btn btn-primary btn-block" type="submit">Daftar!</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('login') }}">Sudah Punya Akun? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

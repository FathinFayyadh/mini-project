@extends('layout.master')
@section('title','Register')
@section('content')
        
<div class="container-fluid bg-dark vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center align-items-center">
        <div class="col-md-5 text-center">
            <img src="{{ asset('img/logo-medsos.png') }}" alt="Logo" class="img-fluid" style="width: 150px;">
        </div>
        <div class="col-md-6">
            <div class="  p-1" >
                <h2 class=" col-6 text-center mb-4">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror " name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password" >
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"  name="password_confirmation" >
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div class="text-lg-end text-md-center text-center  w-100">
                        <button type="submit" class="btn btn-light text-dark fw-bold w-25 ">Register</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <span>Sudah punya akun? <a href="{{route('login')}}" class="text-white">Login</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
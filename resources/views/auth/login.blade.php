@extends('layout.master')

@section('content')
    <div class="container-fluid bg-dark vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center align-items-center">
            <div class="col-md-2 text-end">
                <img src="{{ asset('img/logo-medsos.png') }}" alt="Logo" class="img-fluid" style="width: 150px;">
            </div>
            <div class="col-md-6">
                <div class="  p-1">
                    <h2 class=" col-6 text-center mb-4">Login</h2>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">EmailAddress</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-lg-end text-md-center text-center  w-100">
                            <button type="submit" class="btn btn-light text-dark fw-bold w-25 ">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <span> Belum punya akun? <a href="{{ route('register') }}" class="text-white">register</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

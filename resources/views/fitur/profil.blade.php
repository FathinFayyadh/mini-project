@extends('layout.master')
@section('tile', 'Comment')

@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
<div class="container py-2 main-content-profile">
    <div class="row ">
        <div class="col-md-11">
            <div class=" bg-dark border-0">
                <div class="d-flex  mt-3 ms-5 justify-content-between">
                    <div class="   d-flex align-items-center ">
                        <img src="{{ Storage::url('public/user/' .Auth::user()->image) }}" alt="Logo"
                        class="img-fluid rounded-circle" style="width: 50px; width: 100px;" name="image">
                    <div class="mx-3 mt-0">
                        
                        <h3 class="">{{ Auth::user()->name}} </h3>
                        <p class="mb-0"> {{ Auth::user()->username }}</p>
                        <div class="d-flex text-center text-secondary">
                            <div class="">
                                <strong>{{ Auth::user()->posts->count() }}</strong> Posts
                            </div>
                            <div class="mx-2">
                                <strong>0</strong> Followers
                            </div>
                            <div class="mx-2">
                                <strong>1</strong> Following
                            </div>
                    </div>
                </div> 
            </div>
            <div class="">
                <a href="#" class="  text-dark h4">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                        <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                    </button>
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content bg-secondary">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan password</h1>
                            </div>
                            <div class="modal-body ">
                              <form  action="{{route('profile.create')}}" method="post">
                                @csrf
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
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                              <button type="Submit" class="btn btn-info">Submit</button>
                            </div>
                              </form>
                          </div>
                        </div>
                      </div>
                </a>
            </div>
            </div>
            <div class="text-center text-secondary h-100 d-flex align-items-center justify-content-center mt-5">
                <p class="mt-3">Belum ada postingan yang dapat ditampilkan</p>
            </div>
        </div>
    </div>
    <footer class="text-center mt-auto py-3 bg-dark text-secondary">
        <div class="container">
            <div class="row">
                <div class="col">lorem</div>
                <div class="col">lorem</div>
                <div class="col">lorem</div>
                <div class="col">lorem</div>
                <div class="col">lorem</div>
                <div class="col">lorem</div>
            </div>
        </div>
    </footer>
    </div>

@endsection

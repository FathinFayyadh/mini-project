
@extends('layout.master')
@section('tile', 'Comment')

@section('sidebar')
    @include('layout.sidebar')
@endsection
@section('navbar')
    @include('layout.navbar')
@endsection
@section('content')
    
<div class="container-fluid main-content">
    <div class="row">
        <div class="col-md-6   ">
            <div class="">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex align-items-center">
                        <form class="d-flex" role="search" method="GET" action="">
                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                    </div>
                    
                </div>
            </div>
            @foreach ( $user as $users )
                
            <div class="d-flex justify-content-center align-items-center p-1 mt-2">
                <div class="me-3">
                    @if ($users->image == null)
                            <img id="image-preview" src="{{ asset('img/default_profile.png') }}" class="img-fluid rounded-circle " src="" alt=""  style="width: 50px; hight: 50px;"  name="image">
                            @else
                            <img src="{{ Storage::url('public/user/' .$users->image) }}" alt="Logo"
                            class="img-fluid rounded-circle" style="width: 50px; hight: 50px;" name="image">
                            @endif
                </div>
                <div>   
                    <p class="mb-0"> {{ Auth::user()->name}}  </p>
                    <p class="text-secondary mt-0">{{ Auth::user()->username }}</p>
                </a>
            </div>
        </div>
        @endforeach
            <div class="col-md-6 fixed-follow p-4">
                <div class="mb-4">
                    <h5>Siapa yang harus diikuti</h5>
                    <p class="text-secondary">Orang yang Mungkin anda kenal</p>
                    <ul class="list-unstyled">
                        @foreach ($userRecomended as $userRecomendeds)
                            
                        <li class="d-flex align-items-center mb-3">
                            @if ($userRecomendeds->image == null)
                            <img id="image-preview" src="{{ asset('img/default_profile.png') }}" class="img-fluid rounded-circle " src="" alt=""  style="width: 50px; hight: 50px;"  name="image">
                            @else
                            <img src="{{ Storage::url('public/user/' .$userRecomendeds->image) }}" alt="Logo"
                            class="img-fluid rounded-circle" style="width: 50px; hight: 50px;" name="image">
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="m-0">{{ $userRecomendeds->name}} </h6>
                                <small>{{$userRecomendeds->username }}</small>
                            </div>
                            <button class="btn btn-outline-primary btn-sm">Follow</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
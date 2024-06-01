@extends('layout.master')
@section('tile','Comment')

@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-4 ">
            <div class=" bg-dark text-white mb-4 d-flex justify-content-between">
                    @foreach ($bookmarks as $bookmark)
                    <div class="card-body border border-secondary p-3">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ Storage::url('public/user/' . $bookmark->post->user->image) }}" alt="Logo"
                                class="img-fluid rounded-circle" style="width: 50px; width: 50px;" name="image">
                                <div>
                                    <h6 class="m-0">{{ $bookmark->post->user->name }}</h6>
                                    <small>{{ $bookmark->post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if($bookmark->post && $bookmark->post->image)
                            <img src="{{ Storage::url('public/posts/' . $bookmark->post->image) }}" alt="Post Image" class="img-fluid" style="width: 200px; height: 170px; object-fit: cover">
                        @endif
                        </div>
                       
                        </div>
                        @endforeach
                    </div>
                
            </div>
            
        </div>
    </div>

@endsection
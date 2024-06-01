
@extends('layout.master')
@section('title', 'Dashboard')

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('navbar')
@include('layout.navbar')
@endsection

@section('content')
@include('layout.maincontent')
@endsection
@section('footer')
    @guest
    <footer class="bg-secondary text-white p-3 text-center mt-auto">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <span>Jangan ketinggalan berita terbaru</span>
                <div>
                    <a href="{{route('login')}}" class="btn btn-outline-light me-2">Login</a>
                    <a  href="{{route('register')}}" class="btn btn-light">Register</a>
                </div>
            </div>
    </div>
    </footer>
    @endguest

@endsection
        
@extends('layout.master')
@section('tile', 'Comment')

@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('navbar')
<nav class="navbar navbar-dark bg-dark navbar-custom text-center">
    <div class="container">
        <div class="row w-100 ">
            <div class="flex justify-content-center text-center">
                <div class="col-12 justify-content-center ">
                    <a class="" href="#">
                        <img src="{{asset('img/logo-medsos.png')}}" alt="Logo" width="30" height="35" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-12 d-flex justify-content-center mt-2">
                    <div class="col-4">
                        <div class="d-flex ms-3 mb-2   justify-content-around"> <!-- Rata tengah konten ini -->
                            <a href=" " class="text-decoration-none text-white ">Semua</a>
                            <a href=" " class="text-decoration-none text-white" >Komentar</a>
                            <a href=" " class="text-decoration-none text-white" >Disukai</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')
    <div class="container-fluid  main-content-comment">
        <div class="row p-2 justify-content-center">
            <div class="col-10">
            <div class="d-flex align-items-center">

                    <div class=" ">
                        <img src="{{ asset('img/no_image.png') }} " class="img-fluid rounded-circle " alt="Heart Image"
                        style="width:60px; height:50px">
                    </div>
                    <div class="ms-3">
                        <p class="mb-0" >Mulai mengikuti anda</p>
                    </div>
                </div>
                </div>
                
        </div>
    </div>
    @endsection

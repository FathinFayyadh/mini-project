@extends('layout.master')
@section('css')
    <style>
        .image-upload {
            position: relative;
            max-width: 360px;
            margin: 0 auto;
            overflow: hidden;
        }
        .image-upload input {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0;
        }
        .upload-field {
            display: block;
            border-radius: 11px;
        }
        .upload-field .file-thumbnail {
            cursor: pointer;
            text-align: center;
            height: 150px;
        }
        .upload-field .file-thumbnail h3 {
            font-size: 20px;  
            font-weight: 600;
        }
        .text-area {
            border: none;
            outline: none;
        }
    </style>
@endsection
@section('js')
    <script>
        function fileValue(value) {
            var path = value.value;
            var extension = path.split('.').pop().toLowerCase();
            if (extension == "jpg" || extension == "jpeg" || extension == "png") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                }
                reader.readAsDataURL(value.files[0]);
                document.getElementById('file-label').style.display = 'none';
            } else {
                alert("File not supported. ");
            }
        }
    </script>
@endsection
@section('title', 'Posting')

@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="container-fluid main-content">
        <div class="row">
            <div class="card border border-secondary bg-dark col-5">
                <div class="card-body">

                    <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <img src="{{ Storage::url('public/user/' .Auth::user()->image) }}" alt="Logo"
                                class="img-fluid rounded-circle" style="width: 50px; width: 50px;" name="image">
                            </div>
                            <div class="">
                                <h5 class="card-title me-4"> {{ Auth::user()->name }}</h5>
                            </div>
                            <div class="">
                                <a href="" class="h5"><i class="fa-solid fa-ellipsis"></i></a>
                            </div>
                        </div>

                        <div class=" mt-3">
                            <textarea class="w-100 text-area bg-dark text-light @error('content') is-invalid @enderror" id="description" rows="1" name="content" required placeholder="Deskripsi Postingan"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="image-upload bg-dark">
                                <input type="file" name="image" id="logo" onchange="fileValue(this)">
                                <label for="logo" class="upload-field" id="file-label">
                                    <div class="file-thumbnail border border-secondary d-flex justify-content-center align-items-center">
                                        <h3 id="filename">Pilih Gambar</h3>
                                    </div>
                                </label>
                            </div>
                            <div class="">
                                <img id="image-preview" class="img-fluid" src="" alt="" >
                            </div>
                            <div class="border border-secondary "></div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-info fw-bold text-light">Posting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

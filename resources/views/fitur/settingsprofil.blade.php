@section('css')
<style>
        .edit-profile-container {
            max-width: 500px;
            margin: auto;
            padding-top: 50px;
        }
        .form-label {
            color: #fff;
        }
        .profile-pic-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 20px;
        }
        .profile-pic-container img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-pic-container .upload-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }
        .profilePicInput {
            display: none;
        }
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
            height: 25px;
            padding: 10px;
            border-radius: 20px;
        }
        .upload-field .file-thumbnail h3 {
            font-size: 20px;  
            font-weight: 600;
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
                alert("File not supported. Kindly upload an image of the following extensions: jpg, jpeg, png");
            }
        }
    </script>
@endsection
@extends('layout.master')
@section('tile', 'Comment')

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')
<div class="container py-2 main-content-profile">
    <div class="row ">
        <div class="col-md-11">
            <form action="{{route('settings.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
          <div class="container edit-profile-container">
                <div class="text-center mb-4">
            <div class="profile-pic-container">
                  @if ($user->image == null)
                    <img src="{{ asset('img/logo-medsos.png') }}" alt="Logo" class="mb-3" style="width: 50px;">
                    @else
                    <img src="{{ Storage::url('public/user/' .$user->image) }}" alt="Logo"
                    class="img-fluid rounded-circle" style="width: 50px;" name="image">
                    @endif
                <img id="image-preview" src="{{ asset('img/default_profile.png') }}" class="img-fluid rounded-circle " src="" alt=""  name="image">
                <label for="profilePicInput" class="upload-icon">
                    <div class="image-upload bg-dark rounded-circle">
                        <input type="file" name="image" id="logo" onchange="fileValue(this)">
                        <label for="logo" class="upload-field" id="file-label">
                            <div class="file-thumbnail border border-secondary rounded-circle d-flex justify-content-center align-items-center bg-primary">
                                <i class="fas fa-camera"></i>
                              
                            </div>
                        </label>
                    </div>
                </label>    
            </div>
            <h2>Edit Profile</h2>
        </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama"  name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" rows="3" name="bio" >{{ $user->bio}}</textarea>

            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
        </div>
    </div>
</div>

@endsection

@extends('layout.master')

@section('title', 'Comment')


@section('sidebar')
@include('layout.sidebar')
@endsection

@section('navbar')
<nav class="navbar navbar-dark bg-dark navbar-custom text-center">
    <div class="container">
        <div class="row w-100">
            <div class="col-12 mt-4 text-center">
                <a href="#">
                    <img src="{{ asset('img/logo-medsos.png') }}" alt="Logo" width="45" height="35" class="d-inline-block align-text-top">
                </a>
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')
<div class="container-fluid main-content-comment">
    <div class="row p-2">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-arrow-left p-1 mb-1"></i>
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                <h5>Back</h5>
            </a>
        </div>
        <div class="border border-secondary d-flex p-3">
            <div class="col-md-6 p-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/default_profile.png') }}" class="rounded-circle" alt="" style="width: 50px; height: 50px;">
                    <div class="ms-3">
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                    </div>
                </div>
                <p class="mt-0 p-1">{{ $post->content }}</p>
                @if($post->image)
                <div class="p-1">
                    <img src="{{ Storage::url('public/posts/' .$post->image) }}" alt="Post Image" class="img-fluid">
                </div>
                @endif
            </div>
            <div class="col-5 p-1">
                <h5>Komentar</h5>
                <div class="mb-3">
                    @if (count($post->comments) > 0)
                        @foreach ($post->comments()->whereNull('parent_comment_id')->with('childComments.user')->get() as $comment)
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-center text-white" style="width: 35px; height: 35px;">
                                    <!-- Foto Profil -->
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                </div>
                            </div>
                            <p class="mt-0 mb-0">{{ $comment->content }}</p>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <a href="#" class="h5 me-2"><i class="fa-regular fa-heart"></i></a> 
                                    <p>1 Like</p>
                                </div>
                                <div>
                                    @if ($comment->user_id == Auth::user()->id)
                                    <form action="{{ route('comment.delete', $comment->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger text-decoration-none">Hapus</button>
                                    </form>
                                    @endif
                                    <button class="btn text-success" type="button" id="balasButton">Replay</button>
                                </div>
                            </div>
                            <form action="{{ route('commentsReplay.post', $comment->id) }}" method="post" id="balasComand" style="display: none;">
                                @csrf    
                                <textarea class="w-100 text-area bg-dark text-light border-bottom border-2 border-secondary @error('content') is-invalid @enderror"
                                    id="description" rows="1" name="content" required></textarea>
                                <button class="btn btn-dark text-light mt-2" type="submit">Kirim</button>
                            </form>
                            @foreach ($comment->childComments as $childComment)
                            <div class="mb-3 ms-5">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-center text-white" style="width: 35px; height: 35px;">
                                        <!-- Foto Profil -->
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">{{ $childComment->user->name }}</h6>
                                    </div>
                                </div>
                                <p class="mt-0 mb-0">{{ $childComment->content }}</p>
                                <div class="d-flex justify-content-between mt-1">
                                    <div class="d-flex">
                                        <a href="#" class="h5 me-2"><i class="fa-regular fa-heart"></i></a>
                                        <p>1 Like</p>
                                    </div>
                                    <div class="d-flex">
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="post" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger text-decoration-none">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    @else
                        <p class="text-secondary text-center m-4">Belum ada Komentar</p>
                    @endif
                </div>
                <div class="border-top border mb-3 mt-3"></div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="#" class="h5 me-1"><i class="fa-regular fa-heart"></i></a>
                        <a href="#" class="h5 me-1"><i class="fa-regular fa-comment"></i></a>
                        <a href="#" class="h5 me-1"><i class="fa-regular fa-paper-plane"></i></a>
                    </div>
                    <div>
                        <a href="#" class="h5 me-1"><i class="fa-regular fa-bookmark"></i></a>
                    </div>
                </div>
                <p class="mb-0">1 Like</p>
                <small class="mt-0">1 day ago</small>
                <form action="{{ route('comments.post', $post->id) }}" method="post">
                    @csrf
                    <div class="d-flex align-items-center mt-2">
                        <textarea class="w-100 text-area bg-dark text-light border-bottom border-2 border-secondary @error('content') is-invalid @enderror"
                            id="description" rows="1" width="100%" name="content" required placeholder="Komentar"></textarea>
                        <button class="btn btn-dark text-light" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('css')
<style>
    .text-area {
        border: none;
        outline: none;
    }
    </style>
@endsection
@section('js')
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("balasButton").addEventListener("click", function() {
        document.getElementById("balasComand").style.display = "block";
    });
});

</script>
<script>
    $(document).ready(function() {
        $('.delete-form').submit(function(e) {
            e.preventDefault();
            if (confirm(" ingin menghapus komentar ini?")) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@endsection
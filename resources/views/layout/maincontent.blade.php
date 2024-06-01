<div class="container-fluid main-content">
    <div class="row">
        <div class="col-md-6 content-scrollable  ">
            <div class=" bg-dark text-white mb-4">
                @foreach ($posts as $post)
                    <div class="card-body border border-secondary p-3 mb-3">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ Storage::url('public/user/' . $post->user->image) }}" alt="Profile"
                                    class="rounded-circle me-2" style="width: 50px;">
                                <div>
                                    <h6 class="m-0">{{ $post->user->name }}</h6>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('bookmark', $post->id) }}" class="h4">
                                    @if ($post->bookmarks()->where('user_id', Auth::id())->exists())
                                        <i class="fa-solid fa-bookmark"></i>
                                    @else
                                        <i class="fa-regular text-white fa-bookmark"></i>
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div>
                            <p>{{ $post->content }}</p>
                            <img src="{{ Storage::url('public/posts/' . $post->image) }}" alt="Heart"
                                class="img-fluid">
                        </div>
                        <div class="border-bottom border-secondary mt-3"></div>

                        <div class="d-flex align-items-center mt-3 align-items-center">
                            <div class="me-3 d-flex align-items-center">
                                <a href="{{ route('like', $post->id) }}" class="h4 me-2">
                                    @if ($post->likes()->where('user_id', Auth::id())->exists())
                                        <i class="fa-solid fa-heart"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                </a>


                                <p> {{ $post->likes->count() }} like</p>
                            </div>
                            <div class="me-3 d-flex align-items-center">
                                <a href="{{ route('comments', $post->id) }}" class="h4  me-2"><i
                                        class="fa-regular fa-comment"></i></a>
                                <p>comment</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
                                    <h6 class="m-0">{{ $userRecomendeds->name }} </h6>
                                    <small>{{ $userRecomendeds->username }}</small>
                                </div>
                                <button class="btn btn-outline-primary btn-sm">Follow</button>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

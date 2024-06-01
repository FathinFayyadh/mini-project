<div class="sidebar bg-dark border-end border-secondary text-white">
    <div class="d-flex justify-content-center align-items-center p-1 mt-2">
        <div class="me-3">
            @guest
                <img src="{{ asset('img/default_profile.png') }}" alt="Logo" class="img-fluid rounded-circle"
                    style="width: 50px;">
            @else
                @if (Auth::check() && Auth::user()->image == null)
                <img src="{{ asset('img/default_profile.png') }}" alt="Logo" class="img-fluid rounded-circle"
                    style="width: 50px;">   
                @else
                    <img src="{{ Storage::url('public/user/' . Auth::user()->image) }}" alt="Logo"
                        class="img-fluid rounded-circle" style="width: 50px; hight: 50px;" name="image">
                @endif
            @endguest
        </div>
        <div>
            <a href="{{ route('profile') }}" class="text-decoration-none text-light ">
                @guest
                    <p class="mb-0">Silahkan Login</p>
                    <p class="text-secondary mt-0">Ayo login</p>
                @else
                    <p class="mb-0"> {{ Auth::user()->name }} </p>
                    <p class="text-secondary mt-0">{{ Auth::user()->username }}</p>
                @endguest
            </a>
        </div>
    </div>
    <div class="border-top border mb-4"></div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('dashboard') }}"><i
                    class="fas fa-home menu-icon"></i> Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('explore') }}"> <i class="fas fa-search menu-icon"></i>
                Explore</a>
        </li>

        @guest

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt menu-icon"></i>
                    Login</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('notifikasi') }}"> <i class="fa-solid fa-bell"></i>
                    Notifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('posts') }}"> <i class="fa-solid fa-plus"></i> Posting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('bookmarks') }}"> <i
                        class="fa-solid fa-bookmark me-1"></i>Borkmark</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-in-alt menu-icon"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                    @csrf
                </form>
            </li>
        @endguest

    </ul>
</div>

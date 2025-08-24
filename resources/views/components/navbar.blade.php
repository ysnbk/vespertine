<nav>
    <div class="nav-container">
        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/shop') }}">Shop</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            @auth
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </button>
              <div class="dropdown-menu ">
            <form action={{ route('logout') }} method="POST">
                @csrf
                <button class="btn w-100">Log out</button>
            </form>
        </div>
            @endauth
            @guest
            <button data-bs-toggle="modal" data-bs-target="#register">Register</button>
            <button data-bs-toggle="modal" data-bs-target="#login">Log in</button>
            @endguest
        </div>
    </div>
</nav>
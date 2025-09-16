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
        @else
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Log in</a>
        @endauth
        </div>
    </div>
</nav>
<script>
    
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    
        const navLinks = document.querySelector('.nav-links');
        
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
        
        // Close menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });
    </script>
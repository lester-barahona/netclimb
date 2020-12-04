<header>
    <div class="logo"><span class="ico"></span> <span><a href="/">NetClimb</a></span></div>
    <span class="bar-horizontal"></span>
    <div class="header-menu-rigth">
        <a class="nav-link-rigth" href="#">Contact</a>
        
        @auth
        <a href="{{ url('/dashboard') }}" class="btn-black btn-md">Dashboard</a>
         @else
        <a class="nav-link-rigth" href="{{ route('login') }}">Log in</a>
        @if (Route::has('register'))
            <a class="btn-black btn-md" href="{{ route('register') }}">Sign Up</a>
        @endif
    @endauth
    </div>
</header>
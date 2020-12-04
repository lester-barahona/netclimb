<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/dashboard-styles.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <title>Dashboard - {{Auth()->user()->name}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/app.js')}}" defer></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    @yield('head')
</head>
<body>
    <div class="principal-container">
        <div class="sidebar-container">
            <div class="logo"><span class="ico"></span> <span> <a href="{{url('/')}}">NetClimb</a> </span></div>
            <nav class="navigation">
                <ul class="nav-list">
                    <li class="nav-item {{setActive('dashboard')}} {{setActive('repo.list')}}"><span class="material-icons">format_list_bulleted</span> <a href="{{route('dashboard')}}">Projects</a></li>
                    <li class="nav-item {{setActive('profile')}}"><span class="material-icons">perm_identity</span> <a href="{{route('profile')}}">Profile</a></li>
                    <li class="nav-item {{setActive('news')}}"><span class="material-icons">new_releases</span> <a href="{{route('news')}}">New</a></li>
                </ul>
            </nav>
        </div>
        <div class="content-principal-container">
            <div class="content-top">
                <span class="material-icons darkmode-ico">brightness_4</span>
                <span class="material-icons notifications-ico">notifications</span>
                <div class="dropdown-container">
                    {{-- <img src="https://avatar.oxro.io/avatar.svg?name={{Auth()->user()->name}}" alt=""> --}}
                    <img src="{{Auth()->user()->avatar}}" alt="">
                </div>
                
                <label for="check">
                    <span class="material-icons arrow-ico">arrow_drop_down</span>  
                </label>
                <input type="checkbox" name="chech" id="check">
                <div class="logout-container">
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" >
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                
            </div>
            <div class="content-principal">
                <div class="tabs-container">
                    <span class="tab-pill {{setActivePill('dashboard')}}"> <span class="material-icons">playlist_add_check</span> <a href="{{route('dashboard')}}">List</a></span>
                    <span class="tab-pill {{setActivePill('repo.list')}}"><span class="material-icons">tab</span><a href="{{route('repo.list')}}">Repositories</a></span>
                    <span class="tab-pill {{setActivePill('news')}}"><span class="material-icons">new_releases</span><a href="{{route('news')}}">News</a></span>
                </div>

                {{-- principal --}}
                <div id="app">
                    @yield('content')
                </div>
                {{-- principal --}}
            </div>
        </div>
    </div>

    @yield('js')
</body>
</html>
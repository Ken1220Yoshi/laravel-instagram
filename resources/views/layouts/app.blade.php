<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    @auth
                        {{-- Center of Navbar --}}
                        <form action="{{route('search')}}" method="get">
                            @csrf
                             <input type="text" name="search" id="search" placeholder="Search..." class="form-control w-100" required>
                             <button type="submit" class="btn-search"></button>
                        </form>
                    @endauth
                     

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{route('index')}}" class="nav-link">
                                    <i class="fa-solid fa-home icon-sm"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('post.create')}}" class="nav-link">
                                    <i class="fa-solid fa-circle-plus icon-sm"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::user()->avatar)
                                        <img src="{{Auth::user()->avatar}}" alt="#" class="rounded-circle avatar-sm " style="height: 35px" width="35px">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm"></i>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @can('access-admin')
                                         <a href="{{route('admin.users')}}" class="dropdown-item">
                                            <i class="fa-solid fa-user-gear"></i> Admin
                                        </a>
 
                                        <hr class="mb-2 mt-1">
                                    @endcan
                                        
                                       
                                    
                                    
                                    <a href="{{route('profile.show',Auth::id())}}" class="dropdown-item">
                                        <i class="fa-solid fa-user"></i> Profile
                                    </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="row justify-content-center">
                @if (Request::is('admin/*'))
                    <div class="col-3 ps-5">
                        
                        <div class="list-group border">
                            <a href="{{route('admin.users')}}" class="{{Request::is('admin/users*') ? 'bg-primary text-white' : 'text-dark'}} text-decoration-none   p-2 rounded-top"><i class="fa-solid fa-users"></i> Users</a>
                            <a href="{{route('admin.posts')}}" class="{{Request::is('admin/posts*') ? 'bg-primary text-white' : 'text-dark'}} text-decoration-none  p-2 border-bottom"><i class="fa-solid fa-newspaper"></i> Posts</a>
                            <a href="{{route('admin.categories')}}" class="{{Request::is('admin/categories*') ? 'bg-primary text-white' : 'text-dark'}} text-decoration-none  p-2"><i class="fa-solid fa-tags"></i> Categories</a>
                        </div>
                    </div>
                @endif
                    
               
                    
                
                
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>

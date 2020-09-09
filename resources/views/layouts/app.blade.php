<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="px-4">
            <div class="row">

                @if(Auth::check())
                    <div class="col-lg-3 py-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>

                            <br>

                            @if(Auth::user()->isAdmin)
                                <li class="list-group-item">
                                    <a href="{{ route('users.index') }}">
                                        Users
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('users.create') }}">
                                        Create user
                                    </a>
                                </li>

                                <br>

                                <li class="list-group-item">
                                    <a href="{{ route('posts.index') }}">
                                        Posts
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('posts.create') }}">
                                        Create post
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('posts.trashed.posts') }}">
                                        Trashed posts
                                    </a>
                                </li>

                                <br>

                                <li class="list-group-item">
                                    <a href="{{ route('comments.index') }}">
                                        Comments
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('replies.index') }}">
                                        Replies
                                    </a>
                                </li>

                                <br>

                                <li class="list-group-item">
                                    <a href="{{ route('categories.index') }}">
                                        Categories
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('categories.create') }}">
                                        Create category
                                    </a>
                                </li>

                                <br>

                                <li class="list-group-item">
                                    <a href="{{ route('tags.index') }}">
                                        Tags
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('tags.create') }}">
                                        Create tag
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>


                    <div class="col-lg-9 py-4">
                        @yield('content')
                    </div>
                @endif

                @yield('otherpage')

            </div>
        </main>
    </div>

<!-- Scripts -->
@yield('js')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

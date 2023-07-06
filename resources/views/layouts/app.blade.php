<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        let checkUpdates = () => {
            let messageCount = $('.messages-divs').length
            $.ajax({
                url: '{{ route('messages-count') }}',
                method: 'post',
                success: (data) => {
                    if (+messageCount !== +data) {
                        $('#messages').load('#messages .messages-divs')
                    }
                }
            })
        }
        setInterval(checkUpdates, 1000)
    </script>

    <style>
        @media not screen and (min-width: 800px) {
            html {
                font-size: 15px;
            }
            .card-header {
                width: 100%;
            }
            .card-body {
                width: 100%;
            }
            .avatar img {
                width: 30px;
                position: relative;
                top: 42px;
                left: 15px;
                z-index: 1;
            }
            .username {
                position: relative;
                left: 35px;
            }
            .messages-content {
                display: flex;
                flex-direction: column;
            }
            .messages-content__wrapper {
                display: flex;
                flex-direction: column;
            }
        }
        @media not screen and (min-width: 700px) {
            html {
                font-size: 15px;
            }
            .card-header {
                width: 100%;
            }
            .card-body {
                width: 100%;
            }
            .avatar img {
                width: 30px;
                position: relative;
                top: 42px;
                left: 15px;
                z-index: 1;
            }
            .username {
                position: relative;
                left: 35px;
            }
            .messages-content {
                display: flex;
                flex-direction: column;
            }
            .messages-content__wrapper {
                display: flex;
                flex-direction: column;
            }
        }
        @media not screen and (min-width: 500px) {
            html {
                font-size: 13px;
            }
            .card-header {
                width: 100%;
            }
            .card-body {
                width: 100%;
            }
            .avatar img {
                width: 30px;
                position: relative;
                top: 39px;
                left: 13px;
                z-index: 1;
            }
            .username {
                position: relative;
                left: 35px;
            }
            .messages-content {
                display: flex;
                flex-direction: column;
            }
            .messages-content__wrapper {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

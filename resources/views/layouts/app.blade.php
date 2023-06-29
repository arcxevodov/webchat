<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script>
        setInterval(() => {
            $('#messages').load('#messages .messages-divs')
        }, 1000)
        async function messageSend(url) {
            let inputText = $('#message').val()
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'html',
                data: {
                    text: inputText
                },
                success: function (data) {
                    $('#messages').load('#messages .messages-divs')
                    $('#message').val('')
                }
            })
        }
        async function deleteMessage(url) {
            let inputText = $('#message').val()
            $.ajax({
                url: url,
                method: 'get',
                dataType: 'html',
                data: {
                    text: inputText
                },
                success: function (data) {
                    $('#messages').load('#messages .messages-divs')
                }
            })
        }
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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top mb-5">
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

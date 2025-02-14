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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript - correct order is important -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!-- full jQuery, not slim -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<!-- Date Range Picker CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Date Range Picker JS -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</head>

<style>
nav
{
    height: 70px;
}

.logo
{
    height: 68px;
    width: auto;
    overflow: hidden;
    margin: 0px;
}

a
{
    color: black;
}

.nav-icon
{
    font-size: 2.0rem;
    color: black !important;
}

#navbarDropdown::after {
    display: none;
}

.find-button {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    color: white;
    background-color: #dcbf7d;
    font-weight: bold;
    transition: background-color 0.3s ease;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* admin-select-box */

.select-box
{
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 20px;
    background-color: #004aad;
}

.select-box i
{
    color: white;
    font-size: 4rem;
    opacity: 0.2;

}

.select-box p
{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 18px;
    color: white;
    font-weight: bold;

}
</style>

<body>
    <div id="app">
    @if (!Route::is('register') && !Route::is('login'))
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('image_logo/logo.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a href="{{ route('guest.search') }}" class="find-button">Find a Property</a>
                        @if(Auth::user()) {{-- login pattern --}}
                            <a href="{{ route('messages.index', Auth::user()->id) }}" class="find-button ms-3">Messages</a>
                                @if(Auth::user()->role === "1") {{-- guest pattern --}}
                                <a href="{{ route('guest.reservation_guest')}}" class="find-button ms-3">Bookings</a>
                                @elseif(Auth::user()->role === "2") {{-- host pattern　--}}
                                <a href="{{ route('guest.reservation_guest')}}" class="find-button ms-3">Bookings</a>
                                <a href="{{ route('host.reservation_host')}}" class="find-button ms-3">Your Guests</a>
                                @elseif(Auth::user()->role === "0") {{-- admin pattern --}}
                                <a href="{{ route('admin.hostRequest.index')}}" class="find-button ms-3">Host Requests</a>
                                @endif
                        @endif
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
                            <li class="nav-item dropdown d-flex align-items-center">
                                <i class="fa-solid fa-circle-user nav-icon"></i>
                                <span class="ms-3">{{ Auth::user()->name }}</span>
                                <a class="ms-3"id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-bars nav-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role == "2")
                                        <a class="dropdown-item" href="{{ route('host.index') }}">
                                            <i class="fa-solid fa-house"></i> Accommodation index
                                        </a>
                                        <a class="dropdown-item" href="{{ route('host.reservation_host') }}">
                                            <i class="fa-solid fa-bed"></i> Reservation status
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">
                                            <i class="fa-solid fa-address-card"></i> Profile
                                        </a>
                                    @endif
                                    @if(Auth::user()->role == "0")
                                        <a class="dropdown-item px-3 py-3" href="{{ route('admin.users') }}">
                                            <i class="fa-solid fa-users"></i> users
                                        </a>
                                        <a class="dropdown-item px-3 py-3" href="{{ route('admin.accommodation') }}">
                                        <i class="fa-solid fa-house-chimney"></i> accommodation
                                        </a>
                                        <a class="dropdown-item px-3 py-3" href="{{ route('admin.categories') }}">
                                            <i class="fa-solid fa-tags"></i> categories
                                        </a>
                                    @endif
                                    @if(Auth::user()->role == "1")
                                        <a class="dropdown-item" href="{{ route('guest.reservation_guest') }}">
                                            <i class="fa-solid fa-bed"></i> Reservation status
                                        </a>
                                        <a class="dropdown-item" href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">
                                            <i class="fa-solid fa-address-card"></i> Profile
                                        </a>
                                    @endif
                                    <a class="dropdown-item px-3 py-3" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('Logout') }}
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
        @endif

        @if (request()->is('admin/*'))
        <main class="mt-3">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-2">
                            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                                <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                                    <div>
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <p class="mt-3">Users</p>
                                </div>
                            </a>
                            <a href="{{ route('admin.accommodation') }}" class="text-decoration-none">
                            <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                                <div>
                                <i class="fa-solid fa-house-chimney"></i>
                                </div>
                                <p class="mt-3 ">
                                    Accommodate
                                </p>
                            </div>
                            </a>
                            <a href="{{ route('admin.categories') }}" class="text-decoration-none">
                            <div class="select-box mb-3 d-flex justify-content-center align-items-center">
                                <div>
                                <i class="fa-solid fa-tags"></i>
                                </div>
                                <p class="mt-3 ">
                                    Categories
                                </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-10">
                            @yield('content2')
                        </div>
                    </div>
                </div>
            </main>
            @else
            <main class="pt-4">
                @yield('content')
            </main>
            @endif

            @if (!Route::is('register') && !Route::is('login'))
            <footer class="mt-3">
                <div class="row">
                    <div class="col-auto">
                        <h1>ROOMIFY</h1>
                    </div>
                    <div class="col-auto">
                        <h5>COMPANY</h5>
                        <p><a href="#">About Us</a></p>
                        <p><a href="#">Contact Us</a></p>
                    </div>
                    <div class="col-auto">
                        <h5>HELP CENTER</h5>
                        <p><a href="#">Find a Property</a></p>
                        <p><a href="#">How To Host?</a></p>
                        <p><a href="#">FAQs</a></p>
                        <p><a href="#">Rental Guides</a></p>
                    </div>
                    <div class="col-auto title">
                        <h5>CONTACT INFO</h5>
                        <p>Phone: 1234567890</p>
                        <p>Email: roomify@gmail.com</p>
                        <p>Location: 100 Smart Street, Tokyo, <br>JAPAN</p>
                        <div class="app">
                                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <small class="left">(c) 2025 @roomify | All rights reserved</small>
                    </div>
                    <div class="col">
                        <small class="right">Created with love by @roomify</small>
                    </div>
                </div>
            </footer>
            @endif
        </div>
</body>
</html>

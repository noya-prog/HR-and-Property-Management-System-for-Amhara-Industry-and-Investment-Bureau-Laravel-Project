@php
    $routeName = Route::currentRouteName();
    
@endphp

<div class="header d-flex justify-content-between">
    <div class="left-items">
        <span class="item">Amhara Industry And Investment Bureau </span>
        <span class="item"><i class="fa-sharp fa-solid fa-phone-flip"></i>+251-97853-28372</span>
    </div>
    <div class="right-items  ">
        {{-- <span class="item"><i class="fa-brands fa-facebook  icons"></i></span> --}}
        {{--  <span class="item"><i class="fa-brands fa-square-instagram icons"></i></span>
        <span class="item"><i class="fa-brands fa-twitter icons"></i></span>
        <span class="item"><i class="fa-brands fa-linkedin icons"></i></span> --}}
        <span><a class="text-decoration-none text-light pr-1" href="{{ route('login') }}">Login</a></span>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="logo-wrapper ">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end  text-capitalize" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center ">
                <li class="nav-item ">
                    <a class="nav-link {{ $routeName == 'FrontHome' ? 'active' : '' }} "
                        href="{{ route('FrontHome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $routeName == 'about' ? 'active' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Ministry</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ $routeName == 'contact' ? 'active' : '' }} "
                        href="{{ route('contact') }}">Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ $routeName == 'gallery' ? 'active' : '' }} "href="{{ route('gallery') }}">Gallery</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- import jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> {{-- import bootstrap --}}
    <script>
        BASE_URL = "<?php echo url(''); ?>";
    </script>
    <title>Accueil Movie time</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Gp - v4.6.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-scrolled ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="{{ route('home') }}">Movie Time<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li><a class="nav-link scrollto active" href={{ route('admin') }}>Panneau admin</a></li>
                    @endif
                    <li><a class="nav-link scrollto active" href={{ route('home') }}>Accueil</a></li>
                    @auth
                        {{-- <li><a class="nav-link scrollto" href="{{ route('movie-details') }}">Film</a></li> --}} <li><a class="nav-link scrollto"
                                href="{{ route('playlists') }}">Playlists</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('addMediaPage') }}">Ajouter media</a></li>
                    @else
                        {{-- <li><a class="nav-link scrollto" href="{{ route('addFilm') }}">CRUD (Jalon 2)</a></li> --}}
                        <li><a class="nav-link scrollto" href="#main">Découvrir</a></li>

                    @endauth

                    <!-- .navbar -->
                    @auth
                        <li class="dropdown"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                    </path>
                                </svg><span> Compte</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('profil') }}">Mon profil</a></li>
                                {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{ route('historique') }}">Historique</a></li>
                                <li><a href="{{ route('favoris') }}">Favoris</a></li>
                                <li><a href="{{ route('playlists') }}">Playlists</a></li>
                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link class="btn-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </ul>
                        </li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            @else
                </nav>
                <a href="{{ route('login') }}" class="get-started-btn scrollto">Connexion</a>
            @endauth
        </div>
    </header>
    <!-- End Header -->

    @yield('content')


    <!-- End #main -->

    <!-- ======= Footer ======= -->


    <footer id="footer" class="bottom mb-0;">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Movie Time</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Made by <strong><a href="">Atif & Tantaoui</a></strong>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    {{-- <div id="preloader"></div> --}} <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>


</html>

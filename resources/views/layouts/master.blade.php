<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4255938759353057"
     crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- CSS FILES -->        
        <link href="{{ asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('front/css/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('front/css/barkatul.css')}}" rel="stylesheet">
        @stack('styles')
    </head> 
    <body id="section_1">
        <header class="site-header">
            <div class="container">
                <div class="row">                
                    <div class="col-lg-8 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-geo-alt me-2"></i>
                            Bekasi Jawa Barat, Indonesia
                        </p>
                        <p class="d-flex mb-0">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@company.com">
                                info@barkatul.my.id
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="https://twitter.com/cucuabdurrahman" target="_blank" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.facebook.com/groups/282685402283349/" target="_blank" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.instagram.com/kumpiabdurrahman/" target="_blank" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.youtube.com/@kumpiabdurrahman3275" target="_blank" class="social-icon-link bi-youtube"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ asset('front/images/logo.png')}}" class="logo img-fluid">
                    <span>
                        {{ config('app.name', 'Laravel') }}
                        <small>Majelis Ratibul Haddad</small>
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('main.profil')}}">Profil</a>
                        </li>
                        @foreach($pages as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('main.pages',$item->slug)}}">{{$item->judul}}</a>
                        </li>
                        @endforeach

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Surah</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('main.surah')}}">Al Quran</a></li>
                                <li><a class="dropdown-item" href="{{route('main.yasin')}}">Surah Yasin</a></li>
                                <li><a class="dropdown-item" href="{{route('main.ratib')}}">Ratib Al Haddad</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jadwal</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li></li><a class="dropdown-item" href="{{route('jadwal.sholat')}}">Sholat</a></li>
                            <li></li><a class="dropdown-item" href="{{route('jadwal.imsakiyah')}}">Imsakiyah</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Kontak</a>
                        </li>
                         @guest
                         @if (Route::has('login'))   
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="{{ route('login')}}">Login</a>
                        </li>
                        @endif
                        @else 
                        <li>
                            <a class="nav-link custom-btn custom-border-btn btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                       </li>
                        @endguest  
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            @yield('content')
            
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-12 mb-4">
                        <img src="{{ asset('front/images/logo.jpg')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-5 col-md-6 col-12 mb-4">
                        <h5 class="site-footer-title mb-3">Akses Link</h5>

                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Kegiatan</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Galeri</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Jamaah</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Keluarga</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Rekanan</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-md-6 col-12 mx-auto">
                        <h5 class="site-footer-title mb-3">Informasi kontak</h5>

                        <p class="text-white d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 120-240-9600" class="site-footer-link">
                                0856 999 888
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                info@barkatulkaunain.my.id
                            </a>
                        </p>

                        <p class="text-white d-flex mt-3">
                            <i class="bi-geo-alt me-2"></i>
                            Bintara Jaya, Bekasi Jawa Barat. Indonesia
                        </p>

                        <a href="#" class="btn btn-primary btn mt-3">Google Maps</a>
                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-7 col-12">
                            <p class="copyright-text mb-0">Copyright © 2022 - {{ date('Y') }} <a href="{{ url('/') }}">Barkatul Kaunain</a></p>
                        </div>
                        
                        <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="https://twitter.com/cucuabdurrahman" target="_blank" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://www.facebook.com/groups/282685402283349/" target="_blank" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://www.instagram.com/kumpiabdurrahman/" target="_blank" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://www.youtube.com/@kumpiabdurrahman3275" target="_blank" class="social-icon-link bi-youtube"></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('front/js/jquery.min.js')}}"></script>
        <script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('front/js/jquery.sticky.js')}}"></script>
        <script src="{{ asset('front/js/click-scroll.js')}}"></script>
        <script src="{{ asset('front/js/counter.js')}}"></script>
        <script src="{{ asset('front/js/custom.js')}}"></script>

    </body>
</html>
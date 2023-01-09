
@include('front.common.header')

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                @if (isset($getsetting))
                <h1>{{ $getsetting->logo }}<span>.</span></h1>
                @endif

            </a>

            <nav id="navbar" class="navbar">
                <ul>

                    <li><a href="{{ route('home') }}"><span>Home</span> </a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#about">About</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('blog') }}">Blog</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

            <a class="btn-getstarted scrollto" href="{{ route('home') }}#about">Get Started</a>

        </div>
    </header><!-- End Header -->


   @yield('content')
    @include('front.common.footer')

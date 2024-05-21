<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Procurement Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

 
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <h1 class="sitename">Procurement Management</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="{{ route('user.orderlist')}}">Order List</a></li>

          @if (Auth::check() && Auth::user()->role === 'VENDOR')
          <li><a href="{{ route('vendor.proposal') }}">My Proposals</a></li>
          @endif

          @if (Auth::check() && Auth::user()->role === 'VENDOR')
          <li><a href="{{ route('vendor.orderList') }}">My Order</a></li>
          @endif
          
          {{-- <li><a href="#contact">Contact</a></li> --}}

          @if (Auth::check() && Auth::user()->role === 'VENDOR')
            <li>
              <a href="{{ route('vendor.profile') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg> <span class="ps-1">Profile</span>
              </a>
            </li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
        <a class="btn-getstarted" href="{{ route('register')}}">Register Here</a>
        <a class="btn-getstarted" href="{{ route('login')}}">Login</a>
      @else
        @if (Auth::user()->role === 'MANAGER')
          <a class="btn-getstarted" href="{{ route('home')}}">Go To Admin</a>
        @endif

        <a class="btn-getstarted" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      
      @endguest

    </div>
  </header>

    @if (\Session::has('success'))
        <div class="alert alert-primary" role="alert" style="margin-top: 150px;">
            {!! \Session::get('success') !!}
        </div> 
    @endif

    <div style="min-height:60vh">
        @yield('content')
    </div>



  <footer id="footer" class="footer position-relative">

    
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">QuickStart</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://www.facebook.com/MahfuzAhmed1999/">Mahfuz Ahmed Akash</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    $(".alert").delay(4000).slideUp(200, function() {
                $(this).alert('close');
    });
</script>


@yield('js')
</body>

</html>
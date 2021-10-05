<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Digital Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/animate.css">
    
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="/frontend/css/aos.css">

    <link rel="stylesheet" href="/frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="/frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/frontend/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/frontend/css/flaticon.css">
    <link rel="stylesheet" href="/frontend/css/icomoon.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Digital<span>Car</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto active">
	          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="/cars" class="nav-link">Cars</a></li>
              <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/service" class="nav-link">Services</a></li>
              <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>  
             
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
             <li class="nav-item"><a href="/registration" class="nav-link">Rented-Car</a></li>
           
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{ Auth::user()->image }}" class="rounded" width="30" />   {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item" href="/home">{{ __('Profile') }}</a>
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
    <!-- END nav -->
    
        @yield('content')
    


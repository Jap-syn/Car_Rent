<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/backend//assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/backend/assets/img/favicon.png">
  <title>
    Digital Car
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="/backend/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/backend/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/backend/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="/backend/dashboard" class="simple-text logo-mini">
            DC
          </a>
          <a href="/backend/dashboard" class="simple-text logo-normal">
            Digital Car
          </a>
        </div>
        
        <ul class="nav">
            @if(Auth::user()->role_id == 2)
            <li>
             <a href="/backend/dashboard">
                <i class="tim-icons icon-settings-gear-63"></i>
                <p>Dashboard</p>
              </a>
            </li>
           
            <li>
             <a href="/backend/car">
              <i class="tim-icons icon-delivery-fast"></i>
              <p>Car List</p>
            </a>
          </li>
         <li>
           <a href="/backend/registration/create">
              <i class="tim-icons icon-bus-front-12"></i>
              <p>Rented-Car List</p>
            </a>
          </li>
          <li>
          <li>
           <a href="/backend/registration">
              <i class="tim-icons icon-bus-front-12"></i>
              <p>Returned-Car List</p>
            </a>
          </li>
          <li>
            <a href="/backend/home">
              <i class="tim-icons icon-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="/backend/feedback/create">
              <i class="tim-icons icon-satisfied"></i>
              <p>Feedback</p>
            </a>
          </li>
          @else
          <li>
            <a href="/backend/dashboard">
               <i class="tim-icons icon-settings-gear-63"></i>
               <p>Dashboard</p>
             </a>
           </li>
           <li>
            <a href="/backend/log">
              <i class="tim-icons icon-satisfied"></i>
              <p>log</p>
            </a>
        </li>
           <li>
            <a href="/backend/registration">
              <i class="tim-icons icon-bus-front-12"></i>
              <p>Rented-Car List</p>
            </a>
          </li>
          <li>
            <a href="/backend/car">
              <i class="tim-icons icon-delivery-fast"></i>
              <p>Car List</p>
            </a>
          </li>
          <li>
            <a href="/backend/brand">
              <i class="tim-icons icon-shape-star"></i>
              <p>Brand List</p>
            </a>
          </li>
          <li>
            <a href="/backend/cartype">
              <i class="tim-icons icon-align-left-2"></i>
              <p>Car Type List</p>
            </a>
          </li>
          <li>
          <a href="/backend/role">
                <i class="tim-icons icon-badge"></i>
                <p>Role List</p>
              </a>
          </li>
          <li>
            <a href="/backend/user/create">
              <i class="tim-icons icon-simple-add"></i>
              <p>User Create</p>
            </a>
          </li>
          <li>
            <a href="/backend/report">
              <i class="tim-icons icon-badge"></i>
              <p>Report</p>
            </a>
          </li>
          <li>
            <a href="/backend/home">
              <i class="tim-icons icon-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
              <a href="/backend/feedback">
                <i class="tim-icons icon-satisfied"></i>
                <p>Feedback</p>
              </a>
          </li>
         
           
          @endif
        </ul>
        
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item" style="margin-top:3px;">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-bell-55"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
                </ul>
              </li>
              
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
             
                  <li class="dropdown nav-item">
                      <a href="/home" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ Auth::user()->image }}" alt="Profile Photo">
                        </div>
                          
                      <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">
                          Log out
                        </p>
                      </a>
                    

                  <ul class="dropdown-menu dropdown-navbar" >
                      <li class="nav-link"><a class="nav-item dropdown-item" href="/home"><i class="tim-icons icon-single-02"></i> {{ __('Profile') }}</a></li>
                      <li class="nav-link"><a class="nav-item dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"><i class="tim-icons icon-button-power"></i>
                          {{ __('Logout') }}
                      </a></li>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </ul>
              </li>
          @endguest      
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->

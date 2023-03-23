<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <!-- <link rel="icon" type="image/x-icon" href="../uploads/favicon.ico"> -->
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- Scripts -->
        <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.min.css') }}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=""
        target="_blank">
        <span class="ms-1 font-weight-bold text-white">Admin dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <form method="GET"><a class="nav-link text-white " href="{{ url('admin/categories/create')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dodaj kategoriju</span>
          </a></form>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/categories')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Kategorije</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ url('/admin/product/create')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dodaj proizvod</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('admin/product')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Proizvodi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="admin/orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Porudžbine</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="storeadd.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Dodaj prodavnicu</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="storeadmin.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Prodavnice</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
                <a href="route('logout')" class="btn bg-gradient-primary mt-4 w-100" type="button" onclick="event.preventDefault(); this.closest('form').submit();">
                   {{ __('Log Out') }}
                </a>
          </form>
      </div>
    </div>
  </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div>@include('layouts.inc.adminnavbar')</div>
            <div>
                @yield('content')
            </div>
        </main>
        <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>

        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status'))
        
            <script>
                swall("{{ session('status') }}");
            </script>
       
        @endif
        

    </body>
</html> 



<nav class="navbar fs-3 navbar-expand-lg navbar-dark bg-body-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand bg-danger fs-6 " href="{{ url('/') }}"> .HELL SHOP. </a><img src="../uploads/favicon.ico" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link  active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/categories') }}">Kategorije</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="">Kontakt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Moje porudžbine</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
              
          </a>
          <ul class="dropdown-menu text-white">
            <li><a class="dropdown-item fs-3" href="">Izloguj se</a></li>
            <li><a class="dropdown-item fs-3" href="">Lista želja</a></li>
          </ul>
        </li>
        @if (Route::has('login'))
        <li class="nav-item" >
          @auth
          <a href="{{url('/cart') }}" class="nav-link text-white">Korpa</a>
        </li>
        @else
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link text-white">Log in</a>
        @if (Route::has('register'))
        </li>
        <li>
          <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
            @endif
        </li>
        @endauth
        @endif
        <li>
          <a href="{{ url('/dashboard') }}" class="  bg-danger text-white nav-link">Admin panel</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
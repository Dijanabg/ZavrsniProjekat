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
        
        @if (Route::has('login'))
        <li class="nav-item" >
          @auth
          <a href="{{url('/cart') }}" class="nav-link text-white">Korpa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
              {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item text-dark">
              <form method="POST" action="{{ route('logout') }}">
              @csrf
                <a href="route('logout')" class="btn bg-primary w-100" type="button" onclick="event.preventDefault(); this.closest('form').submit();">
                   {{ __('Log Out') }}
                </a>
              </form>
            </li>
            <li><a class="dropdown-item fs-3" href="">Lista želja</a></li>
          </ul>
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
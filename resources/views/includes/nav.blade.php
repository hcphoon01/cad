<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a href="{{route('home')}}" class="navbar-brand"><img class="navbar-logo"
      src="{{asset('img/logo.png')}}">EmergencyRP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100">
      <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">MDT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/fms/cad')}}">CAD</a>
      </li>
      <li class="nav-item {{ Request::is('civilian') ? 'active' : '' }}">
        <a class="nav-link" href="#">Civilian</a>
      </li>
      @can('Assign Duty Listings')
      <li class="nav-item {{ Request::is('listing') ? 'active' : '' }}">
        <a class="nav-link" href="#">Duty Listings</a>
      </li>
      @endcan
      @role('Human Resources|Gold')
      <li class="nav-item {{ Request::is('hr') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('hr.index')}}">HR</a>
      </li>
      @endrole
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">{{ Auth::user()->name }}</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
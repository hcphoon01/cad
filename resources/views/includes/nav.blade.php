<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a href="{{route('home')}}" class="navbar-brand"><img class="navbar-logo" src="img/logo.png">EmergencyRP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100">
      <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">MDT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CAD</a>
      </li>
      <li class="nav-item {{ Request::is('civillian') ? 'active' : '' }}">
        <a class="nav-link" href="#">Civillian</a>
      </li>
      @can('Assign Duty Listings')
      <li class="nav-item {{ Request::is('listing') ? 'active' : '' }}">
        <a class="nav-link" href="#">Duty Listings</a>
      </li>
      @endcan
      @role('HR')
      <li class="nav-item {{ Request::is('hr') ? 'active' : '' }}">
        <a class="nav-link" href="#">HR</a>
      </li>
      @endrole
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
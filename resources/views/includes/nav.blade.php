<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a href="{{route('home')}}" class="navbar-brand"><img class="navbar-logo" src="{{asset('img/1logo.png')}}"></a>
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
        <a class="nav-link " href="{{url('/fms/mdt')}}">MDT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/fms/cad')}}">CAD</a>
      </li>
      <li class="nav-item {{ Request::is('civilian*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('civilian.index')}}">Civilian</a>
      </li>
      @role('Human Resources|Gold')
      <li class="nav-item {{ Request::is('hr*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('hr.index')}}">HR</a>
      </li>
      @endrole
      @can('manage duty listings')
      <li class="nav-item {{ Request::is('duty*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('duty.index')}}">Duty Listings</a>
      </li>
      @endcan
      @can('manage vehicles')
      <li class="nav-item {{ Request::is('vehicle*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('vehicle.index')}}">Vehicle Management</a>
      </li>
      @endcan
      @can('update ranks')
      <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('users.index')}}">User Management</a>
      </li>
      @endcan
      <li class="nav-item dropdown ml-auto"">
        <a class=" nav-link dropdown-toggle {{ Request::is('profile*') ? 'active' : '' }}" href="#"
        id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->displayName() }}</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
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
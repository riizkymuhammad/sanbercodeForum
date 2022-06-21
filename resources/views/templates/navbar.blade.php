<nav class="navbar navbar-expand-lg main-navbar">
  <a href="index.html" class="navbar-brand sidebar-gone-hide">StuckCoding</a>
  <div class="navbar-nav">
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
  </div>
  <div class="nav-collapse">
    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
      <i class="fas fa-ellipsis-v"></i>
    </a>
  </div>
  <form class="form-inline ml-auto">
    <ul class="navbar-nav">
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    @auth
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" @if(isset(Auth::user()->avatar))  src="{{ asset('avatar/'.Auth::user()->avatar) }}" @else  src="{{asset('assets/img/avatar/avatar-1.png')}}" @endif class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">{{Auth::user()->email}}</div>
        <a href="{{route('profile.index')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
    @else
    <li class="nav-item active"><a href="{{route('login')}}" class="nav-link">Login</a></li>
    <li class="nav-item active"><a href="{{route('register')}}" class="nav-link">Register</a></li>
    @endauth
  </ul>
</nav>
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ URL::asset('img/brand/lgthree-logo.svg') }}" width="133" height="38" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{ URL::asset('img/brand/lgthree-logo-icon.svg') }}" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>
    <ul class="nav navbar-nav d-md-down-none">

    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="{{ Auth::user()->name }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>{{ Auth::user()->name }}</strong>
                </div>
                @if (Auth::user()->isAdmin)
                <a class="dropdown-item" href="{{ route('backend.dashboard') }}">
                      <i class="fa fa-cogs"></i> Admin Panel
                  </a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>
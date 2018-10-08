<nav class="navbar navbar-light sticky-top bg-white d-flex justify-content-start">
    <div class="col-6 d-flex justify-content-start">
        <div class="col-2">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('img/logo.png') }}" class="d-inline-block align-top" width="89" height="25" alt="{{ config('app.name') }}">
            </a>
        </div>
        <div class="col-10">
            <form action="/" method="get">
                <label for="q" class="sr-only">{{ __('Search') }}</label>
                <input type="search" id="q" name="q" placeholder="{{ __('Find an Event or Championship') }}" class="shadow-none bg-light border-0 col-12 font-lg rounded search-input" value="{{ request('q') }}">
            </form>
        </div>
    </div>
    <div class="col-6 font-lg font-weight-bold navbar navbar-expand-lg d-flex justify-content-end">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('championships.index') }}" class="d-block nav-link menu-link px-3 text-black-50">{{ __('Championships') }}</a>
            </li>
            @guest
                <li class="nav-item">
                    <a href="#" class="d-block nav-link menu-link px-3 text-success">{{ __('Login') }}</a>
                </li>
            @endguest

            @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        @hasanyrole('admin|colaborator')
                        <a href="{{ route('admin.home') }}" class="dropdown-item">{{ __('Admin') }}</a>
                        @endhasanyrole
                        <a href="#" class="dropdown-item">{{ __('Perfil') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
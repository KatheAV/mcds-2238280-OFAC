<nav class="navbar navbar-expand-md navbar-dark bg-larapp shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('imgs/logo.svg') }}" width="34px"> LARAPP
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home') }}">
                        <i class="fa fa-clipboard-list"></i> 
                        Dashboard
                    </a>
                </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
               <!-- Authentication Links -->
               @guest
               @php $locale = session()->get('locale'); @endphp
               <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @switch($locale)
                @case('en')
                <img src="{{asset('imgs/en.png')}}" width="20px"> English
                @break
                @case('es')
                <img src="{{asset('imgs/es.png')}}" width="20px"> Español
                @break
                @default
                <img src="{{asset('imgs/en.png')}}" width="20px"> English
                @endswitch
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('locale/en') }}">
                    <img src="{{asset('imgs/en.png')}}" width="20px"> English
                </a>

                <a class="dropdown-item" href="{{ url('locale/es') }}">
                    <img src="{{asset('imgs/es.png')}}" width="20px"> Español
                </a>
            </div>
        </li>
        <li class="nav-item d-none d-sm-block"><span class="nav-link">|</span></li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fa fa-user-lock"></i> 
                @lang('general.link-login')
            </a>
        </li>
        <li class="nav-item d-none d-sm-block"><span class="nav-link">|</span></li>
        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                <i class="fa fa-user-edit"></i> 
                @lang('general.link-register')
            </a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{ asset(Auth::user()->photo) }}" class="img-thumbnail rounded-circle" width="40px">
                {{ Auth::user()->fullname }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if (Auth::user()->role == "Admin")
                <a class="dropdown-item" href="{{ url('users') }}">
                    <i class="fa fa-users"></i>
                    Module Users 
                </a>
                <a class="dropdown-item" href="{{ url('categories') }}">
                    <i class="fas fa-list-alt"></i>
                    Module Categories 
                </a>
                <a class="dropdown-item" href="{{ url('games') }}">
                    <i class="fas fa-gamepad"></i>
                    Module Games 
                </a>
                <div class="dropdown-divider"></div>
                @elseif(Auth::user()->role == "Editor")
                {{--  --}}
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-times"></i> 
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endguest
</ul>
</div>
</div>
</nav>
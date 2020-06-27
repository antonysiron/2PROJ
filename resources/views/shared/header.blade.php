<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/images/logo.png" alt="brand logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('surveys.index') }}">{{ __('Sondage') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('surveys.index') }}">{{ __('Analyse') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('feedback.index') }}">{{ __('Avis') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('surveys.index') }}">{{ __('Contact') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="btn" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" id="btn-main" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Mes Sondage') }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('surveys.index') }}"> {{ __('View Sondage') }}</a>
                                <a class="dropdown-item" href="{{ route('surveys.create') }}">{{ __('New Sondage') }}</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('Profile') }}</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

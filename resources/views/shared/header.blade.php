<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
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
                            <a class="nav-link line" href="{{ route('surveys.index') }}">{{ __('Sondage') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link line" href="{{ route('surveys.index') }}">{{ __('Analyse') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link line" href="{{ route('feedback.index') }}">{{ __('Avis') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link line" href="{{ route('prices') }}">{{ __('Tarif') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link line" href="{{ route('contact.index') }}">{{ __('Contact') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="btn" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>



                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" id="btn-main" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                            </li>
                        @endif

                        @if (Route::has('login'))
                        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <span>
                                    <img class="avatar" src="/images/pp.png" alt="avatar">
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('Mon compte') }}</a>
                            </div>
                        </li>

                        @endif

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Mes sondages') }} <span class="caret avatar"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('surveys.index') }}"> {{ __('Voir les sondages') }}</a>
                                <a class="dropdown-item" href="{{ route('surveys.create') }}">{{ __('Nouveau sondage') }}</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="avatar">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="caret avatar">
                                    <img class="avatar" src="/images/pp.png" alt="avatar">
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">{{ __('Mon compte') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest





                </ul>
            </div>
        </div>
    </nav>
</header>

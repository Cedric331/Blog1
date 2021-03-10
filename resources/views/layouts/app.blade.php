<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cecf7fd386.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img id="logo" class="rounded" src="{{ asset('storage/images/logo.jpg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('article-index') }}">Articles</a>
                 </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('photo-index') }}">Photos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Catégories</a>
                        <div class="dropdown-menu animate slideIn">
                           @foreach (allCategories() as $categorie)
                            <a class="dropdown-item text-center font-weight-bold" href="{{ route('article-categorie', ['title' => $categorie->title]) }}">{{ $categorie->title }}</a>
                           @endforeach
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('account-index') }}">
                              {{ __('Mon Compte') }}
                           </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <main class="site-content">

        @if(!empty($page))
         @inertia
        @endif

        @yield('content')
    </main>

    <footer class="site-footer font-small bg-primary darken-4 py-4">
        <div class="container">
            <div class="row">
                <div class="col-8 d-flex justify-content-start">
                    <!-- Copyright -->
                    <div class="footer-copyright text-center text-white bg-transparent">© 2019 Copyright:
                        <a class="text-white" href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
                    </div>
                    <!-- Copyright -->
                </div>
                <div class="col-4 ml-auto d-flex justify-content-end">
                    <ul class="list-unstyled d-flex mb-0">
                        <li>
                            <a class="mr-3 text-white" role="button"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a class="mr-3 text-white" role="button"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a class="mr-3 text-white" role="button"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a class=" text-white" role="button"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

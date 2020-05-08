<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Homepage') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark  navbar-dark sticky-top">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo.png')}}" alt="logo" style="width:40px;">
        <strong>DNA</strong>commerce
    </a>
    <!-- Header -->
    <div class="collapse navbar-collapse">
        <!-- Dropdown Categorie -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Categorie
                </a>
                <div class="dropdown-menu">
                    <h5 class="dropdown-header">Elettronica</h5>
                    <a class="dropdown-item" href="#">Monitor</a>
                    <a class="dropdown-item" href="#">Mouse</a>
                    <a class="dropdown-item" href="#">Laptop</a>
                    <h5 class="dropdown-header">Abbigliamento</h5>
                    <a class="dropdown-item" href="#">Calzini</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Prodotti Vari</a>
                </div>
            </li>
        </ul>
        <!--Search bar-->
        <form class="form-inline my-2 my-lg-0 mr-auto">
            <input class="form-control mr-sm-2 searchBar" type="search" placeholder="Cerca" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                </svg>
            </button>
        </form>
        <!--Options-->
        <ul class="navbar-nav">
            <li class="nav-item nav-item-icon ">
                <a class="nav-link " href="#" title="Accedi" data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="Entra nell'area utente">
                    <svg class="bi bi-person-fill icon-hover" width="30px" height="30px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </li>
            <li class="nav-item nav-item-icon">
                <a class="nav-link " href="#" title="Carrello" data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="0 Articoli nel tuo Carrello">
                    <svg class="bi bi-bag-fill icon-hover" width="25px" height="30px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 4h14v10a2 2 0 01-2 2H3a2 2 0 01-2-2V4zm7-2.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</nav>
<main class="py-3">
    @yield('content')
</main>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
</body>
</html>
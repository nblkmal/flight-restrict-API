<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Flight Restrict API</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/bankmy.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

</head>

<style>
    body {
        background-color: #f7f7f8;
        font-family: 'Montserrat', sans-serif;
    }

    a, label, h1, p{
        color: #434b57;
    }

    a:hover {
        color: #7953f5;
        text-decoration: none;
    }

    .card {
        background-color: white !important;
        border: none;
        border-radius: 15px !important;
    }

    .rounded-link {
        border-radius: 5px !important;
    }

    .title {
        border-color: #7953f5 !important;
        border-radius: 10px !important;
        border-width: 2px !important;
    }

    button, .btn{
        color: #f7f7f8 !important;
        border: none;
        background-color: #7953f5 !important;
        border-radius: 10px !important;
    }

    button:hover, i:hover {
        background-color: #f7f7f8 !important;
        color: #434b57 !important;
    }

    input {
        border-radius: 10px !important;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        margin: 5px;
        /* padding: 10px; */
        background-color: white;
        border-radius: 10px !important;
        color: white;
        text-align: center;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light py-3">
            <div class="container">
                <a class="border p-2 title" href="{{ url('/') }}" style="font-weight: 600; color: #7953f5;">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Flight Restrict API
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-inline-flex align-items-center">
                        {{-- <li class="nav-item">
                            <a href="{{ url('home') }}">Home</a>
                        </li> --}}
                        <li class="nav-item ml-4">
                            <a href="{{ route('place:index') }}">Places</a>
                        </li>
                        <li class="nav-item ml-4">
                            <a href="{{ route('api:docs') }}">API Docs</a>
                        </li>
                        <li class="nav-item ml-4">
                            <a href="{{ route('map:index') }}">Maps</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            
                            @if (Route::has('login'))
                                <li class="nav-item ml-4">
                                    <a class="" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item ml-4">
                                    <a class="" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ml-4">
                                <a href="{{ route('api:token') }}">API Token</a>
                            </li>
                            {{-- Buat policy untuk admin --}}
                            @role('admin')
                                <li class="nav-item ml-4">
                                    <a class="" href="{{ route('file:import') }}">Data</a>
                                </li>
                            @endrole
                            <li class="nav-item dropdown ml-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        
        <footer class="footer">
            <div class="container">
              {{-- <span class="text-muted">Place sticky footer content here.</span> --}}
                <div class="card text-center">
                    <div class="card-body">
                        <button onclick="window.location='{{ route('donate:index') }}'" class="btn">
                            <i class='bx bx-coffee-togo'></i>
                            <strong>Donate for my coffee money</strong>

                        </button>
                        
                    </div>
                </div>
                <small class="p-3"><a href="https://nblkmal.dev/">nblkmal.dev</a></small>
            </div>
          </footer>
    </div>

    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    {{-- @stack('stable-script') --}}
</body>
</html>

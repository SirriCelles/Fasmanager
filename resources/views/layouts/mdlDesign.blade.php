<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fascility Management</title>
    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- link the CDN for material design Lite -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css"> --}}
    <link rel="stylesheet" href="https:://cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css">
    <!-- customised css color sheme -->
    <!-- <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-cyan.min.css" /> -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-indigo.min.css" />

    {{-- bootstrap 4 icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>

<body>
    <!-- start of content -->
    <div class="mdl-layout mdl-js-layout">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Facility Management</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation. We hide it in small screens. -->
                    <nav class="mdl-navigation">
                        {{-- Authentication links --}}

                    @guest
                        <a class="mdl-navigation_link" href="{{ route('login') }}">Login</a>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        {{-- <a class="mdl-navigation__link" href="">User</a> --}}

                    @else
                        <a class="mdl-navigation__link" href="#">
                            <span class="glyphicon glyphicon-user"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <a class="mdl-navigation__link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        </form>
                    
                    @endguest
                    </nav>
                </div>  
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            
                </div>         
            </header>
            
            {{-- Main page content --}}

            <main class="mdl-layout__content">
                <div class="page-content">
                    <!--  content goes here -->
                    <!-- No header, and the drawer stays open on larger screens (fixed drawer). -->
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer">
                        <div class="mdl-layout__drawer">
                            <span class="mdl-layout-title"></span>
{{-- Setting user privileges --}}
                            @if (Auth::user()->roles()->first() !== null)

                            <nav class="mdl-navigation">
                                @foreach (Auth::user()->roles()->first()->privileges()->get() as $privilege)
                                <a class="mdl-navigation__link" href="{{ url($privilege->path) }}">
                                    <span class="{{ $privilege->icon }}"></span>{{$privilege->name}}
                                </a>
                                @endforeach
                            </nav>

                            @endif
                        </div>
                    </div>

                    <div class="mdl-layout mdl-js-layout">
                        <div class="container" style="margin-top: 40px;">
                                @include('inc.messages')
                                @yield('main_content')
                        </div>
                    </div>
                </div>
                
            </main>
            <!-- footer -->
            <footer class="mdl-mini-footer" style="text-align:center;">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">
                        
                                Go-Groups Ltd.
                       
                    </div>
                    <ul class="mdl-mini-footer__link-list">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    </ul>
                </div>
            </footer>
        </div>
        
    </div>     
    
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>
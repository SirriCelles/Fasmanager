<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<header>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- fonts --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- linking CDNs for bootstrap and w3 --}}

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script> 
    
</header>
<body>
    <!-- fixed header -->
    <div class="w3-top">
        <header class="w3-bar w3-theme w3-border-bottom" style="margin-bottom: 95%; padding: 18px;">
            <a href="#" class="w3-bar-item w3-button w3-hover-none"><strong>Facility Management</strong></a>

            {{-- Authentication links --}}
        @guest
            <a href="{{ route('login') }}" class="w3-bar-item w3-button w3-right">
                    <i class="fa fa-user"></i> Link 1
                </a>
        @else
        <div class="w3-dropdown-hover w3-right">
            <button class="w3-button">{{ Auth::user()->name }}
                <i class="caret"></i>
            </button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">

                <a href="{{ route('logout') }}" class="w3-bar-item w3-button"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                >Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
            </div>
        </div>

        @endguest  
        </header>
    </div>

    <!-- sidebar nav  setting privileges-->
    <div class="w3-sidebar w3-light-gray w3-bar-block w3-mobile w3-border-right" style="width:15%; height: 80%;">
        <small class="w3-bar-item">{{ Auth::user()->name }}</small>

    @if (Auth::user()->roles()->first() !== null)
        @foreach (Auth::user()->roles()->first()->privileges()->get() as $privilege )
        <a href="{{url($privilege->path) }}" class="w3-bar-item w3-button w3-hover-black w3-large w3-padding-24">
                <i class="{{$privilege->icon}} w3-xlarge"></i> {{$privilege->name}}
        </a>
        @endforeach
    @endif
    </div>


    <!-- page content -->
    <div  class="container" style="margin-left: 15%; margin-top:5%;">
        @include('inc.messages')
        @yield('main_content') 
    </div>
    <div class="w3-bottom">
        <footer class="w3-bar w3-light-gray w3-padding-16">
            <h3 class="w3-center">footer</h3>
            
        </footer>
    </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html> 

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Fascility Management</title>

        <!-- Fonts -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>

        
        
        
        

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

        <!-- Font Awesome -->
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */
            .navbar {
            margin:30px auto;
            margin-bottom: 0;
            border-radius: 0;


            }


            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 400px; width:400px}

            /* Set gray background color and 100% height */
            /* .sidenav {
            padding-top: 20px;
            //background-color: #272B2B;
            height: 100%;
            } */

            .sidenav {
            padding-top: 20px;
            background-color: ;
            /* margin-top: 30px; */ 
            height: 100%;
            width: 60%
            }
            /* ul(#nav-list){
            color:#DAE0E0 ;
            } */

            /* Set black background color, white text and some padding */
            /* footer {
            background-color: #555;
            color: white;
            padding: 15px;
            } */

            /* On small screens, set height to 'auto' for sidenav and grid */
            /*@media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
            }*/

            /*styleling the logo image*/
            .logo-image{

            border-radius: 10%;
            object-fit: scale-down;
            overflow: hidden;
            margin-top: -6px;
            }
            /* .text_nav{
            text-align:;

            margin-top:-30px;
            } */

            /* img{
            width: 4px;
            height: 4px;
            border-radius: 10%;
            overflow: hidden;
            margin-top: -6px;
            } */
           
        </style>
        
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                         <div class="logo-image">
                            {{-- <img src="imagee/go.jpg" class="img-fuild rounded" height="40" width="100" > --}}
                            Fascility Management
                        </div>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    @guest
                            <li class=""><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in">Login</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                    @else
                    
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    
                    @endguest
                            
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row content ">
                <div class="col-sm-4 sidenav">
                   @include("partials.setPrivileges")

                    
                    
                </div>
                <div class="container">
                    <div class="col-sm-7 text-left">
                        
                        @include('inc.messages')
                        @yield('admin_content')

                    </div>
                </div>
                {{-- <div class="col-sm-2">
                    <div class="">
                        <p></p>
                    </div>
                    <div class="col-sm-2">
                        <p></p>
                    </div>
                </div>
            </div>
        </div> --}}
        <input id="baseURL" type="hidden" value="{{url('/')}}"/>

        {{-- <footer class="container-fluid text-center">
            <p></p>
        </footer> --}}

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           
           @yield('js')
    </body>
</html>


  
  
  

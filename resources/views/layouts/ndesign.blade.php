<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fascility Management</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- date picker.css --}}
    <link rel="stylesheet" href="{{URL::asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    
    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
              <div class="container">
              	<div class="row">
                  	<div class="col">
                      	<div class="media">
                  		     <img src="<?php echo asset('images/img_avatar2.png');?>" alt="Auth user" class="rounded-circle mx-auto d-block" style="width:80px;">
                			</div>
                  </div>
                </div>
                  <div class="row">
                  	<div class="col">
                      	<h5 class="text-center">{{ Auth::user()->name }}</h5>
                      </div>
                  </div>
              </div>
            </div>            
              @if (Auth::user()->roles()->first() !== null)
                <ul class="list-unstyled components">
                    @foreach (Auth::user()->roles()->first()->privileges()->get() as $privilege )
                        <li>
                            <a href="{{url($privilege->path)}}">
                                <i class="{{$privilege->icon}}" style='font-size:17px; padding:10px;'></i>
                            {{$privilege->name}}</a>
                        </li>
                    @endforeach                
              @endif                
                {{-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>                                              --}}
            </ul>
            {{-- some link --}}
            {{-- <ul class="list-unstyled CTAs">
                <!-- <li>
                    <a href="" class="download">some link</a>
                </li> -->
                <li>
                    <a href="" class="article">some link</a>
                </li>
            </ul> --}}
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-md navbar-light fixed-top" style="height: 80px;">
                <div class="container-fluid">
                  <div class="mr-2 p-2">
                    <i class="material-icons" id="sidebarCollapse" style="font-size:40px;color:black;">menu</i>
                  </div>
                  <a class="navbar-brand" href="#">
                    <img src="<?php echo asset('images/go.jpg');?>" alt="logo" class="rounded" style="width:190px;">                    
                  </a>

                    {{-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <i class="fas fa-align-justify"></i> -->
                        <i class="material-icons" style="font-size:20px">keyboard_arrow_down</i>
                    </button> --}}

                    
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item active">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                    @else
                    <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="navbardrop" style="background-color:#fafafa;">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });
            
                    $('#sidebarCollapse').on('click', function () {
                        //open or close navbar
                        $('#sidebar, #content').toggleClass('active');
                        //close dropdowns
                        $('.collapse.in').toggleClass('in');
                        // and also adjust aria-expanded attributes we use for the open/closed arrows
                        // in our CSS
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                }); 
            </script>

            <div class="container-fluid">
                <div class="main_content shadow p-1">
                    <input id="baseURL" type="hidden" value="{{url('/')}}">
                    @include('inc.messages')
                    @yield('main_content')                   
                </div>              
            </div>
                        
            {{-- <nav class="navbar navbar-expand-sm navbar-dark fixed-bottom" id="footerNav">
            <a class="navbar-brand" href="#">Logo</a>
            <ul class="navbar-nav">
                <p>footer</p>          
            </ul>
            </nav> --}}
            
    

</body>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    {{-- datepiker script --}}
    <script src="<?php echo asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
   
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="<?php echo asset('/js/equipment.js');?>"></script>
</html>

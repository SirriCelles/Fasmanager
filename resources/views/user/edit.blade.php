@extends('layouts.ndesign')

@section('main_content')

<div class="container" style="margin-left:400px; display:inline-block;">
    {{-- <div class="row"> --}}
        <div class="col-sm-7" style="background-color:lavender;">

            <div class="list-group">
                {{-- <a href='#' class="list-group-item active">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                </a> --}}
                

                <div class="">
                <form action="{{ action('UserController@update') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <fieldset>
                        <legend class="list-group-item active" style="padding:20px;"><strong>Edit User</strong></legend>

                        <fieldset>
                        <legend style="text-align:center;"><strong>User Information</strong></legend>
                            <div class="form-group">
                                <label for="name">Full Names:</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="location">Address:</label>
                                <input type="text" class="form-control" name="location" value="{{ $user->location }}">
                            </div>
                            <div class="form-group">
                                <label for="text">Job Title:</label>
                                <input type="text" class="form-control" name="job_title" value="{{ $user->job_title }}">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="number" class="form-control" name="contact" value="{{ $user->contact }}">
                            </div>
                            <div class="form-group">
                                <label for="contact">Other Contact:</label>
                                <input type="number" class="form-control" name="ocontact" value="{{ $user->ocontact }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Home Email:</label>
                                <input type="email" class="form-control" name="hemail" value="{{ $user->home_email }}">
                            </div>
                             
                            
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="sex" class="browser-default custom-select">
                                    <option value="{{$user->gender}}" selected>{{$user->gender}}</option>                       
                                  
                                   <option value="Male">Male</option> 
                                   <option value="Female">Female</option> 
                                   <option value="Other">Other</option>
                                </select>
                            </div>
                                
                            </div>
                        </fieldset>

                        <fieldset>
                        <legend style="text-align:center;"><strong>Account Details</strong></legend>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email for School:</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Password:</label>
                                <input type="hidden" class="form-control" name="password" value="{{$user->password}}">
                            </div> --}}
                            <div class="form-group">
                                <select name="role" class="browser-default custom-select">

                                @foreach ($roles as $role )
                                    @if ($role->id == $user->role_id)
                                        <option value="{{$role->id}}" selected>{{ $role->name }}</option>

                                    @else()
                                        <option value="{{ $role->id }}">{{$role->name}}</option>
                                    @endif
                                    
                                @endforeach                                 
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            
                        </fieldset>
                            
                            
                    </fieldset>
                
                </form>
                {{-- @yield('roles_content') --}}
            </div>


            
        </div>
        
    {{-- </div> --}}


</div>



@stop

                            
                             
                             
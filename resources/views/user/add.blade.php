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
                <form action="{{ action('UserController@store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <legend class="list-group-item active" style="padding:20px;"><strong>Add New User</strong></legend>

                        <fieldset>
                        <legend style="text-align:center;"><strong>User Information</strong></legend>
                            <div class="form-group">
                                <label for="name">Full Names:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="location">Address:</label>
                                <input type="text" class="form-control" name="location">
                            </div>
                            <div class="form-group">
                                <label for="text">Job Title:</label>
                                <input type="text" class="form-control" name="job_title">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="number" class="form-control" name="contact">
                            </div>
                            <div class="form-group">
                                <label for="contact">Other Contact:</label>
                                <input type="number" class="form-control" name="ocontact">
                            </div>
                            <div class="form-group">
                                <label for="email">Home Email:</label>
                                <input type="email" class="form-control" name="hemail">
                            </div>
                             
                            
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <div class="radio">
                                    <label><input type="radio" name="sex" value="Male">Male</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="sex" value="Female">Female</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="sex" value="Other" disabled>Other</label>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                        <legend style="text-align:center;"><strong>Account Details</strong></legend>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email for School:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" class="form-control" name="password">
                            </div> --}}
                            <div class="form-group">
                                <select name="role" class="browser-default custom-select">
                                    <option selected>Give this user a role</option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Add</button>
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

                            
                             
                             
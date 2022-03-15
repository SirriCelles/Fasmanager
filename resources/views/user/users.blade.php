@extends('layouts.ndesign')

@section('main_content')

<div class="col-sm-3" style="background-color:lavender;">

</div>

<div class="container" style="margin:20px auto;">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="">
                <div class="">
                    <h2>Manage <b>Users</b></h2>
                </div>
                <div class="">
                    
                </div>            
            </div>
        </div>
         <table class="table table-striped">
            <thead>
                
               
                <tr>
                    <th>No</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Job Title</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>

                
                
                @foreach ($users as $key=> $user)
                    {{-- @if($role->id == $user->role_id) --}}

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->job_title}}</td>
                    <td>{{ $user->contact}}</td>
                    <td>{{ null }}</td>
                    

                    <td><a href="edit/{{$user->id}}" class="btn btn-info">
                    <span class=" glyphicon glyphicon-edit"></span>Details
                    </a></td>
                    <td>
                        <form  action="{{ action('UserController@destroy') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td> 
                    
                    
            
                </tr>

                    {{-- @endif --}}
                    @endforeach
                
            </tbody>
        </table>
        


    </div>
</div>


       
    



        {{-- <div class="col-sm-7" style="padding-left: 50px">
        {{-- <p style="text-align:center; padding-left:50px; margin: 20px auto;  background-color:lavender; font:bold 20px tahoma ;">Existing Users</p> --}}

       
        
    {{-- </div> --}}




@stop
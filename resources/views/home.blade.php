@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                          <p>Log in Successful</p>  
                    </div>
                    logged in
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <form action="{{action('RoleController@userRole')}}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <div class="">
                                <button type="submit" class="btn btn-primary">User</button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="{{action('RoleController@adminRole')}}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <div class="">
                                <button type="submit" class="btn btn-primary">Administrator</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

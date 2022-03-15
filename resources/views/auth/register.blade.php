{{-- @extends('layouts.app')

@section('content') --}}
@extends('layouts.ndesign')

@section('main_content')

<div class="container" style="background-color:lavender;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <fieldset>
                            <legend style="text-align:center;"><strong>User Details</strong></legend>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Full Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="location" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
                                <label for="text" class="col-md-4 control-label">Job Title</label>

                                <div class="col-md-6">
                                    <input id="job_title" type="text" class="form-control" name="job_title" value="{{ old('job_title') }}" required autofocus>

                                    @if ($errors->has('job_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('job_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                <label for="contact" class="col-md-4 control-label">Contact</label>

                                <div class="col-md-6">
                                    <input id="contact" type="number" class="form-control" name="contact" value="{{ old('contact') }}" required autofocus>

                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ocontact') ? ' has-error' : '' }}">
                                <label for="contact" class="col-md-4 control-label">Other Contact</label>

                                <div class="col-md-6">
                                    <input id="ocontact" type="number" class="form-control" name="ocontact" value="{{ old('ocontact') }}">

                                    @if ($errors->has('ocontact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ocontact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Home E-Mail</label>

                                <div class="col-md-6">
                                    <input id="hemail" type="email" class="form-control" name="hemail" value="{{ old('') }}" required autofocus>

                                    @if ($errors->has('hemail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hemail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group{{ $errors->has('hemail') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Home E-Mail</label>

                                <div class="col-md-6">
                                    <input id="hemail" type="email" class="form-control" name="hemail" value="{{ old('') }}">

                                    @if ($errors->has('hemail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hemail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="radio">
                                        <label class="radio-inline"><input type="radio" name="sex" value="Male">Male</label>
                                       
                                         <label class="radio-inline"><input type="radio" name="sex" value="Female">Female</label>
                                        
                                        <label class="radio-inline"><input type="radio" name="sex" value="Other" disabled>Other</label>
                                    </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend style="text-align:center;"><strong>Account Details</strong></legend>

                             <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">User Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select id="role" type="text" class="form-control" name="role" value="{{ old('role')}} " required>

                                    @foreach ($roles as $id => $role )
                                    <option value="{{ $id }}">{{ $role }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

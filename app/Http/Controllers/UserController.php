<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Http\Requests\StoreAddUser;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    public function index()
    {   
        $user = User::all();
        $roles = Role::all();
        
        
        
        
        
        
        //$role = Role::all();
        
       
        return view('user/users')->with('users', $user);
        
        
    }

    public function add()
    {
        $role = Role::all(['id', 'name']);
        
        
        return view('user/add')->with('roles', $role);
    }

    public function store(StoreAddUser $request)
    {
         $user = new User;
         $user->name = $request->input('name');
         $user->job_title  = $request->input('job_title');
         $user->location  = $request->input('location');
         $user->contact  = $request->input('contact');
         $user->other_contact  = $request->input('ocontact');
         $user->home_email  = $request->input('hemail');
         $user->gender  = $request->input('sex');
         $user->username  = $request->input('username');
         $user->email  = $request->input('email');
         //$user->password  = $request->input('password');
         $user->role_id  = $request->input('role');
         

         $user->save();

         

         return redirect()->back()->with('success', 'User Added');

    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('user/edit')->with('user', $user)->with('roles', $role);
    }

    public function update(Request $request) 
    {
        $id = $request->input('user_id');
        $role = Role::all(['id', 'name']);

        $user = User::find($id);
         $user->name = $request->input('name');
         $user->job_title  = $request->input('job_title');
         $user->location  = $request->input('location');
         $user->contact  = $request->input('contact');
         $user->other_contact  = $request->input('ocontact');
         $user->home_email  = $request->input('hemail');
         $user->gender  = $request->input('sex');
         $user->username  = $request->input('username');
         $user->email  = $request->input('email');
        // $user->password  = $request->input('password');
         $user->role_id  = $request->input('role');

         

         $user->save();
         //$gender = $user->gender;

         return redirect('user/users')->with('success', 'User Added');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('user_id');
        $user = User::find($id);
        $user->delete();
        return redirect('user/users');
    }
}

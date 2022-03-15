<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin');
    }

     // public function adminRole(Request $request)
    // {   

    //    //$users = User::all();

    //    return redirect('admin');
        
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function checkPrivilege(\App\Privilege $privilege){
        $user_privileges = Auth::user()->roles()->first()->privileges()->get();
        foreach($user_privileges as $key => $user_privilege){
            if($user_privilege->id == $privilege->id) return true;
        }
        return false;
    }
}

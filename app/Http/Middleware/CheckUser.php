<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
 use App\User;
 use App\Role;
 use Privilege;
 //use Illuminate\Support\Facades\Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $privilege)
    {

        
        

        // if(!$request->user()->hasPrivilege($privilege)) 
        // {
        //     return redirect('nopermission');
        // }
        
        return $next($request);
    }


    // public function hasPrivilege(Privilege $privilege){

    //     $user = Auth::user()->role_id;
        

    //     $userPrivileges = Role::find($user);//->privileges()->orderBy('id')->pluck('id')->all();
    //     foreach($userPrivileges->privileges as $userPrivilege ){
           
    //         if(!($privilege->id === $userPrivilege->id)){
    //             return false;
    //         }
            
    //     }
    //     return true;
    // }
}

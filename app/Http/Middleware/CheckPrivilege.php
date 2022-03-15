<?php

namespace App\Http\Middleware;
use Auth;
 use App\User;
 use App\Role;
 use App\Privilege;
use Closure;

class CheckPrivilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {

        

        $user = Auth::user();
        $role = $user->roles()->first();
        $privileges = $role->privileges()->get();
        dd($role, $privileges);
        

        // $userPrivileges = Role::find($user);//->privileges()->orderBy('id')->pluck('id')->all();
        // foreach($userPrivileges->privileges as $userPrivilege ){
           
        //     if(!($privilege->id === $userPrivilege->id)){
        //         redirect('nopermission');
        //     }
            
        // }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;
use App\User;


class CheckAdmin
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
        $id = Auth::id();
        //dd($id);
        

        $userRoles = User::find($id);
        $request_url="/".$request->path();
        $user_privileges =  $userRoles->roles->privileges;

        $user_has_privilege=$user_privileges->where('path',$request_url);
        //   dd($user_has_privilege);
          
            if( auth()->check())
            {
                // if(count($user_has_privilege) <= 0){
                //     return redirect('/dashboard')->with('error',"Please, you are not authorised to access this page resource");
                // }                
            }
            
        return $next($request);
        
    }
    

}

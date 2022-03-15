<?php

namespace App\Policies;

use App\User;
use App\Role;
use App\Privilege;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrivilegePolicy
{
    use HandlesAuthorization;

    //Determine if user has role.
     //     // $role = Role::all();
    //     // $role->load(['privileges' => function ($query) {
    //     //     $query->orderBy('id', 'name');
    //     // }]);
    //     // dd($role);

    //     // $role = Role::find(2)->privileges()->orderBy('name')->pluck('pslug');
    //     // dd($role);
    //     // $role = Role::with(['privileges'])->get();
    //     // //$role->privileges->get('id');
    //     // //dd($role);
    //     // foreach($role as $role) {
    //     //     dd($role->privileges->pluck('name'));
    //     // }
    //     //dd($role->pivot->pluck('role_id','privilege_id'));

    
        
    //     //dd($user);
    //     //$user = Auth::user()->only('role_id');
    //     //dd($user);
        
      //dd($userPrivileges);
    //     //$userPrivileges->privileges->pluck('id');
    //     //dd($userPrivileges);
    //     //dd($role->privileges->pluck('pslug'));

    //     $privileges = Privilege::orderBy('id')->pluck('id','pslug');
    //     //dd($privileges);

    //     foreach ($privileges as $privilege) {
    //         foreach($userPrivileges as $userPrivilege) {

    //             if(($privilege === $userPrivilege)) {
                   
    //             }
    //             else{
                    
    //         }
    //     }
    //     //dd($privileges);
//
//Determines whether a user has a privilege
    public function hasPrivilege(Privilege $privilege)
    {   


        
         //dd($privilege); 
         $user = Auth::user()->role_id;

        

         $userPrivileges = Role::find($user);//->privileges()->orderBy('id','pslug')->pluck('id','pslug')->all();
         //dd($userPrivileges);
         foreach($userPrivileges->privileges as $userPrivilege ){
             //dd($userPrivilege);
             $userPrivilege->pluck('id');
             //dd($userPrivilege->id);
 
             $privilege = Privilege::find($userPrivilege->id);
             //dd($privilege->id);
            
             if(!($privilege->id === $userPrivilege->id)){
                 return false;
             }
             
         }
         return true;

        // $user = Auth::user()->role_id;
        

        // $userPrivileges = Role::find($user);//->privileges()->orderBy('id')->pluck('id')->all();
        // foreach($userPrivileges->privileges as $userPrivilege ){
           
        //     if(!($privilege->id === $userPrivilege->id)){
        //         return false;
        //     }
            
        // }
        // return true;
    }



    /**
     * Determine whether the user can view the privilege.
     *
     * @param  \App\User  $user
     * @param  \App\Privilege  $privilege
     * @return mixed
     */
    public function view(User $user, Privilege $privilege)
    {
        $user = Auth::user()->role_id;

        

         $userPrivileges = Role::find($user);//->privileges()->orderBy('id','pslug')->pluck('id','pslug')->all();
         //dd($userPrivileges);
         foreach($userPrivileges->privileges as $userPrivilege ){
             //dd($userPrivilege);
             $userPrivilege->pluck('id');
             //dd($userPrivilege->id);
 
             $privilege = Privilege::find($userPrivilege->id);
             //dd($privilege->id);
            
             if(!($privilege->id === $userPrivilege->id)){
                 return false;
             }
             
         }
         return true;

    }

    /**
     * Determine whether the user can create privileges.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the privilege.
     *
     * @param  \App\User  $user
     * @param  \App\Privilege  $privilege
     * @return mixed
     */
    public function update(User $user, Privilege $privilege)
    {
        //
    }

    /**
     * Determine whether the user can delete the privilege.
     *
     * @param  \App\User  $user
     * @param  \App\Privilege  $privilege
     * @return mixed
     */
    public function delete(User $user, Privilege $privilege)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Privilege;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    //Determing if a user has a Role
    // public function userHasRole(Role $role, User $user)
    // {
    //     return $role->id === $user->role_id;
    // }

    // //Determing if a Role has a Privilege

    // public function roleHasPrivilege(Privilege $privilege, Role $role)
    // {
    //     return $role->id === $privilege->role_id;
    // }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        //
    }
}

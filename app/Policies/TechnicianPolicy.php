<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\Technician;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnicianPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any technicians.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can view the technician.
     *
     * @param  \App\User  $user
     * @param  \App\Technician  $technician
     * @return mixed
     */
    public function view(User $user, Technician $technician)
    {
        
    }

    /**
     * Determine whether the user can create technicians.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can update the technician.
     *
     * @param  \App\User  $user
     * @param  \App\Technician  $technician
     * @return mixed
     */
    public function update(User $user, Technician $technician)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can delete the technician.
     *
     * @param  \App\User  $user
     * @param  \App\Technician  $technician
     * @return mixed
     */
    public function delete(User $user, Technician $technician)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can restore the technician.
     *
     * @param  \App\User  $user
     * @param  \App\Technician  $technician
     * @return mixed
     */
    public function restore(User $user, Technician $technician)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the technician.
     *
     * @param  \App\User  $user
     * @param  \App\Technician  $technician
     * @return mixed
     */
    public function forceDelete(User $user, Technician $technician)
    {
        //
    }
}

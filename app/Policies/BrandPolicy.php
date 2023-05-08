<?php

namespace App\Policies;

use App\User;
use App\Brand;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any brands.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can view the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function view(User $user, Brand $brand)
    {
        //
    }

    /**
     * Determine whether the user can create brands.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can update the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function update(User $user, Brand $brand)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can delete the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function delete(User $user, Brand $brand)
    {
        return $user->role_id == Role::IS_ADMIN;
    }

    /**
     * Determine whether the user can restore the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function restore(User $user, Brand $brand)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function forceDelete(User $user, Brand $brand)
    {
        //
    }
}

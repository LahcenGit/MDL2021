<?php

namespace App\Policies;

use App\Models\Achat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->type === 'milkcheck';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Achat $achat)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->type === 'milkcheck';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Achat $achat)
    {
        //
        return $user->type === 'milkcheck';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Achat $achat)
    {
        //
        return $user->type === 'milkcheck';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Achat $achat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Achat $achat)
    {
        //
    }
}

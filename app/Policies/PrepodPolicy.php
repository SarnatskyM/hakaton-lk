<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrepodPolicy
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
        if($user->hasRole(['Преподаватель', 'Администратор'])){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
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
        if($user->hasRole(['Преподаватель', 'Администратор'])){
            return true;
        }
        return false;;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        if($user->hasRole(['Преподаватель', 'Администратор'])){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        if($user->hasRole(['Преподаватель', 'Администратор'])){
            return true;
        }
        return false;
    }
}

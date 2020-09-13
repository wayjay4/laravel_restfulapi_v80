<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\AdminActions;

class UserPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $authenticatedUser, User $user)
    {
        return $authenticatedUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $authenticatedUser, User $user)
    {
        // validate if authenticatedUser is the same as user
        // validate if access_token is a 'personal access token' [can only be generated using api ui]
        //    note: we theck this to BE SURE the user is actually the user
        return $authenticatedUser->id === $user->id && $authenticatedUser->token()->client->personal_access_client;
    }
}

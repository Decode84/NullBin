<?php

namespace App\Policies;

use App\Models\Paste;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PastePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create public pastes.
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createPrivate(User $user)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Paste  $paste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Paste $paste)
    {
        if ($paste->visibility === 'public') {
            return true;
        }

        if ($paste->visibility === 'unlisted') {
            return true;
        }

        if ($paste->visibility === 'private') {
            return $paste->user_id === $user->id;
        }

        return false;
    }
}

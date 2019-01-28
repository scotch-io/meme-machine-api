<?php

namespace App\Policies;

use App\User;
use App\Meme;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the meme.
     *
     * @param  \App\User  $user
     * @param  \App\Meme  $meme
     * @return mixed
     */
    public function view(User $user, Meme $meme)
    {
        return $user->id === $meme->user_id;
    }

    /**
     * Determine whether the user can create memes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the meme.
     *
     * @param  \App\User  $user
     * @param  \App\Meme  $meme
     * @return mixed
     */
    public function update(User $user, Meme $meme)
    {
        //
    }

    /**
     * Determine whether the user can delete the meme.
     *
     * @param  \App\User  $user
     * @param  \App\Meme  $meme
     * @return mixed
     */
    public function delete(User $user, Meme $meme)
    {
        //
    }

    /**
     * Determine whether the user can restore the meme.
     *
     * @param  \App\User  $user
     * @param  \App\Meme  $meme
     * @return mixed
     */
    public function restore(User $user, Meme $meme)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the meme.
     *
     * @param  \App\User  $user
     * @param  \App\Meme  $meme
     * @return mixed
     */
    public function forceDelete(User $user, Meme $meme)
    {
        //
    }
}

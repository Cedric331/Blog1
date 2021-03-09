<?php

namespace App\Policies;

use App\Commentaire;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Commentaire  $commentaire
     * @return mixed
     */
    public function view(User $user, Commentaire $commentaire)
    {
      return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Commentaire  $commentaire
     * @return mixed
     */
    public function update(User $user, Commentaire $commentaire)
    {
         return $user->id == $commentaire->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Commentaire  $commentaire
     * @return mixed
     */
    public function delete(User $user, Commentaire $commentaire)
    {
      return $user->id == $commentaire->user_id;
    }

}

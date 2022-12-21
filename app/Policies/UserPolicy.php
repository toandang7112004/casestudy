<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
 
    public function viewAny(User $user)
    {
        return $user->hasPermission('viewAny');
    }

    public function view(User $user, User $model)
    {
        return $user->hasPermission('view');
    }

    public function create(User $user)
    {
        return $user->hasPermission('create');
    }


    public function update(User $user, User $model)
    {
        return $user->hasPermission('update');
    }

    public function delete(User $user, User $model)
    {
        return $user->hasPermission('delete');
    }


    public function restore(User $user, User $model)
    {
        return $user->hasPermission('restore');
    }


    public function forceDelete(User $user, User $model)
    {
        return $user->hasPermission('forceDelete');
    }
}
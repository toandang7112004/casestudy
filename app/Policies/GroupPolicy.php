<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        return $user->hasPermission('Group_viewAny');
    }

    public function view(User $user)
    {
        return $user->hasPermission('Group_view');
    }

    public function create(User $user)
    {
        return $user->hasPermission('Group_create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('Group_update');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('Group_delete');
    }

    public function restore(User $user)
    {
        return $user->hasPermission('Group_restore');
    }

    public function deleteforever(User $user)
    {
        return $user->hasPermission('Group_deleteforever');
    }
    public function viewtrash(User $user)
    {
        return $user->hasPermission('Group_viewTrash');
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Product;
class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('Product_viewAny');
    }

    public function view(User $user)
    {
        return $user->hasPermission('Product_view');
    }

    public function create(User $user)
    {
        return $user->hasPermission('Product_create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('Product_update');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('Product_delete');
    }

    public function restore(User $user)
    {
        return $user->hasPermission('Product_restore');
    }

    public function deleteforever(User $user)
    {
        return $user->hasPermission('Product_deleteforever');
    }
}

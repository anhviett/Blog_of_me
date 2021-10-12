<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('product_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('product_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('product_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('product_delete');
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}

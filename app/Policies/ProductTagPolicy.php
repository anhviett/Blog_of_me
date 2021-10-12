<?php

namespace App\Policies;

use App\Models\ProductTag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTagPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('product_tag_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('product_tag_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('product_tag_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('product_tag_delete');
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

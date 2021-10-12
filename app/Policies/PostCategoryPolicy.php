<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCategoryPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('post_category_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('post_category_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('post_category_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('post_category_delete');
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

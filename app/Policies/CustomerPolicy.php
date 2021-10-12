<?php

namespace App\Policies;

use App\Models\user;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('user_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('user_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('user_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('user_delete');
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

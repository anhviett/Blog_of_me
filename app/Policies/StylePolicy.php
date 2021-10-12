<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StylePolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('style_view');
    }
    public function create(User $user)
    {
        return $user->checkPermissionAccess('style_create');
    }
    public function update(User $user)
    {
        return $user->checkPermissionAccess('style_edit');
    }
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('style_delete');
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

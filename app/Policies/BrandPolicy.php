<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('brand_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('brand_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('brand_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('brand_delete');
    }
    public function __construct()
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('review_view');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('review_create');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('review_edit');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('review_delete');
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

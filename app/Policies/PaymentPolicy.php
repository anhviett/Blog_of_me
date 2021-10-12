<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;
    public function view(User $user)
    {
        return $user->checkPermissionAccess('payment_view');
    }
    public function create(User $user)
    {
        return $user->checkPermissionAccess('payment_create');
    }
    public function update(User $user)
    {
        return $user->checkPermissionAccess('payment_edit');
    }
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('payment_delete');
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

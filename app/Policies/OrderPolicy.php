<?php

namespace App\Policies;

use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;
    public function view(Order $order)
    {
        return $order->checkPermissionAccess('order_view');
    }

    public function create(Order $order)
    {
        return $order->checkPermissionAccess('order_create');
    }

    public function update(Order $order)
    {
        return $order->checkPermissionAccess('order_edit');
    }

    public function delete(Order $order)
    {
        return $order->checkPermissionAccess('order_delete');
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

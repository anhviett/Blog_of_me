<?php

namespace App\Policies;

use App\Models\Size;
use Illuminate\Auth\Access\HandlesAuthorization;

class SizePolicy
{
    use HandlesAuthorization;
    public function view(Size $size)
    {
        return $size->checkPermissionAccess('size_view');
    }

    public function create(Size $size)
    {
        return $size->checkPermissionAccess('size_create');
    }

    public function update(Size $size)
    {
        return $size->checkPermissionAccess('size_edit');
    }

    public function delete(Size $size)
    {
        return $size->checkPermissionAccess('size_delete');
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

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.home.dashboard', compact('users'));
    }
}

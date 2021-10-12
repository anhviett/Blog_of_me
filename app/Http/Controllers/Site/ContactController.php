<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $menu_items = MenuItem::all();
        return view('site.contact.index', compact('menu_items'));
    }
}

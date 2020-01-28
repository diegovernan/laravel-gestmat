<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\User;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $inventories = Inventory::where('user_id', auth()->user()->id)->latest()->get();

        return view('home', compact('user', 'inventories'));
    }
}

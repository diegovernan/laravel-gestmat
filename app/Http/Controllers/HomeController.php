<?php

namespace App\Http\Controllers;

use App\User;
use App\Supplier;
use App\Product;
use App\Inventory;
use App\Customer;
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

        $inventories = Inventory::where('user_id', auth()->user()->id)->latest()->paginate(5);

        $suppliercount = Supplier::where('user_id', auth()->user()->id)->get()->count();

        $productcount = Product::where('user_id', auth()->user()->id)->get()->count();

        $inventorycount = Inventory::where('user_id', auth()->user()->id)->get()->count();

        $customercount = Customer::where('user_id', auth()->user()->id)->get()->count();

        return view('main.home', compact('user', 'inventories', 'suppliercount', 'productcount', 'inventorycount', 'customercount'));
    }
}

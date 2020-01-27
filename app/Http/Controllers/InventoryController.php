<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest()->get();

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('inventory', compact('inventories', 'products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        //
    }

    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    public function destroy(Inventory $inventory)
    {
        //
    }
}

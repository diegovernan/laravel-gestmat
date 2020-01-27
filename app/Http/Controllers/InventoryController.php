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

    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->user_id = auth()->user()->id;
        $inventory->product_id = $request->product_id;
        $inventory->quantity = $request->quantity;
        $inventory->minimum_quantity = $request->minimum_quantity;

        $inventory->save();

        return redirect()->back()->with('success', 'Transação adicionada!');
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

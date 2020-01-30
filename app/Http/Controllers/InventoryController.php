<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('register.inventory', compact('inventories', 'products'));
    }

    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->user_id = auth()->user()->id;
        $inventory->product_id = $request->product_id;
        $inventory->available_quantity = $request->available_quantity;
        $inventory->minimum_quantity = $request->minimum_quantity;

        $inventory->save();

        return redirect()->back()->with('success', 'Produto adicionado ao estoque com sucesso!');
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('register.inventory-edit', compact('inventory', 'products'));
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

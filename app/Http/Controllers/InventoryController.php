<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
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
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest('updated_at')->paginate(10);

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('main.inventory', compact('inventories', 'products'));
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('main.inventory-edit', compact('inventory', 'products'));
    }

    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $inventory->user_id = auth()->user()->id;
        $inventory->minimum_quantity = $request->minimum_quantity;

        $inventory->save();

        return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
    }
}

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
        $inventory->minimum_quantity = $request->minimum_quantity;
        $inventory->available_quantity = $request->available_quantity;
        $inventory->sold_quantity = $request->sold_quantity;

        $inventory->save();

        return redirect()->back()->with('success', 'Item adicionado ao estoque com sucesso!');
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        return view('register.inventory-edit', compact('inventory', 'products'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->user_id = auth()->user()->id;
        $inventory->product_id = $request->product_id;
        $inventory->minimum_quantity = $request->minimum_quantity;
        $inventory->available_quantity = $request->available_quantity;
        $inventory->sold_quantity = $request->sold_quantity;

        $inventory->save();

        return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->back()->with('success', 'Item excluído do estoque com sucesso!');
    }
}

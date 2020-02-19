<?php

namespace App\Http\Controllers;

use App\SupplierOrder;
use App\Http\Requests\SupplierOrderRequest;
use App\Inventory;
use App\Supplier;
use App\Product;
use App\Mail\SupplierOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupplierOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $supplierorders = SupplierOrder::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $inventory_products = Inventory::where('user_id', auth()->user()->id)->latest()->get();

        $suppliers = Supplier::where('user_id', auth()->user()->id)->latest()->get();

        return view('main.supplierorders', compact('supplierorders', 'inventory_products', 'suppliers'));
    }

    public function store(SupplierOrderRequest $request)
    {
        $supplierorder = new SupplierOrder();
        $supplierorder->user_id = auth()->user()->id;
        $supplierorder->product_id = $request->product_id;
        $supplierorder->supplier_id = $request->supplier_id;
        $supplierorder->quantity = $request->quantity;

        $supplierorder->save();

        Mail::to($supplierorder->supplier->email)->send(new SupplierOrderMail($supplierorder));

        return redirect()->back()->with('success', 'Solicitação enviada com sucesso!');
    }

    public function update(Request $request, SupplierOrder $supplierorder)
    {
        Inventory::where('user_id', auth()->user()->id)->where('product_id', $supplierorder->product_id)->increment('available_quantity', $supplierorder->quantity);

        $supplierorder->arrived = 1;

        $supplierorder->save();

        return redirect()->back()->with('success', 'Solicitação atualizada com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\SupplierOrder;
use App\Supplier;
use App\Product;
use Illuminate\Http\Request;

class SupplierOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $supplierorders = SupplierOrder::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        $suppliers = Supplier::where('user_id', auth()->user()->id)->latest()->get();

        return view('main.supplierorders', compact('supplierorders', 'products', 'suppliers'));
    }

    public function store(Request $request)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $customerorders = CustomerOrder::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        $customers = Customer::where('user_id', auth()->user()->id)->latest()->get();
        
        return view('main.customerorders', compact('customerorders', 'products', 'customers'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, CustomerOrder $customerorder)
    {
        //
    }
}

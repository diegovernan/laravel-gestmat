<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('main.customerorders');
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

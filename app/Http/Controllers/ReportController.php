<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\Inventory;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest('updated_at')->get();

        $total_price = CustomerOrder::where('user_id', auth()->user()->id)->sum('price');

        return view('main.reports', compact('inventories', 'total_price'));
    }
}

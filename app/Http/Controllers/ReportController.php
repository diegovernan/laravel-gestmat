<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Report;
use App\SupplierOrder;
use App\CustomerOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest('updated_at')->get();

        $income = SupplierOrder::where('user_id', auth()->user()->id)->sum('price');

        $expense = CustomerOrder::where('user_id', auth()->user()->id)->sum('price');

        $difference = $expense - $income;

        return view('main.reports', compact('inventories', 'income', 'expense', 'difference'));
    }
}

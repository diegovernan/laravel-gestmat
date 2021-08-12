<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Report;

class ReportController extends Controller
{
    public function index()
    {
        $inventories = Inventory::where('user_id', auth()->user()->id)->latest('updated_at')->get();

        $income = Report::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->sum('income');

        $expense = Report::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->sum('expense');

        $difference = $expense - $income;

        return view('main.reports', compact('inventories', 'income', 'expense', 'difference'));
    }
}

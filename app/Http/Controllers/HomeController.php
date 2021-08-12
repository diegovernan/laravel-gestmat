<?php

namespace App\Http\Controllers;

use App\User;
use App\Supplier;
use App\Product;
use App\Inventory;
use App\Customer;
use App\Report;
use App\CustomerOrder;
use App\SupplierOrder;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $inventories = Inventory::where('user_id', auth()->user()->id)->latest('updated_at')->paginate(10);

        $suppliercount = Supplier::where('user_id', auth()->user()->id)->get()->count();

        $productcount = Product::where('user_id', auth()->user()->id)->get()->count();

        $inventorycount = Inventory::where('user_id', auth()->user()->id)->sum('available_quantity');

        $customercount = Customer::where('user_id', auth()->user()->id)->get()->count();

        // Gráfico 1
        $months = [
            '01' => 'Jan',
            '02' => 'Fev',
            '03' => 'Mar',
            '04' => 'Abr',
            '05' => 'Mai',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Ago',
            '09' => 'Set',
            '10' => 'Out',
            '11' => 'Nov',
            '12' => 'Dez'
        ];

        $months_keys = array_keys($months);
        $months_values = array_values($months);

        $supplierorder_values = [];
        $customerorder_values = [];

        foreach ($months_keys as $month) {
            $supplierorder_values[] = SupplierOrder::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->whereMonth('created_at', $month)->where('arrived', 1)->sum('quantity');
            $customerorder_values[] = CustomerOrder::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->whereMonth('created_at', $month)->sum('quantity');
        }

        $supplierorder_values = array_values($supplierorder_values);
        $customerorder_values = array_values($customerorder_values);

        // Gráfico 2
        $all_orders = SupplierOrder::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->count();

        $arrived_orders = SupplierOrder::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->where('arrived', 1)->sum('arrived');

        // Gráfico 3
        $income = Report::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->sum('income');

        $expense = Report::where('user_id', auth()->user()->id)->whereYear('created_at', date('Y'))->sum('expense');

        return view('main.home', compact('user', 'inventories', 'suppliercount', 'productcount', 'inventorycount', 'customercount', 'months_values', 'supplierorder_values', 'customerorder_values', 'all_orders', 'arrived_orders', 'income', 'expense'));
    }
}

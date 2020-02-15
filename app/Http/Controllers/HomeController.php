<?php

namespace App\Http\Controllers;

use App\User;
use App\Supplier;
use App\Product;
use App\Inventory;
use App\Customer;
use App\CustomerOrder;
use App\SupplierOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $inventories = Inventory::where('user_id', auth()->user()->id)->latest()->paginate(5);

        $suppliercount = Supplier::where('user_id', auth()->user()->id)->get()->count();

        $productcount = Product::where('user_id', auth()->user()->id)->get()->count();

        $inventorycount = Inventory::where('user_id', auth()->user()->id)->get()->count();

        $customercount = Customer::where('user_id', auth()->user()->id)->get()->count();

        // Gráfico de vendas
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

        $customerorder_values = [];
        $supplierorder_values = [];

        foreach ($months_keys as $month) {
            $customerorder_values[] = CustomerOrder::where('user_id', auth()->user()->id)->whereYear('order_at', date('Y'))->whereMonth('order_at', $month)->sum('quantity');
            $supplierorder_values[] = SupplierOrder::where('user_id', auth()->user()->id)->whereYear('order_at', date('Y'))->whereMonth('order_at', $month)->sum('quantity');
        }

        $customerorder_values = array_values($customerorder_values);
        $supplierorder_values = array_values($supplierorder_values);

        // Gráfico de pedidos
        $arrived_suppliers = SupplierOrder::where('user_id', auth()->user()->id)->where('arrived', 1)->pluck('supplier_id')->toArray();
        $arrived_suppliers = array_values($arrived_suppliers);

        $supplierorder_values = [];

        foreach ($arrived_suppliers as $supplier) {
            $supplierorder_values[] = SupplierOrder::where('user_id', auth()->user()->id)->where('supplier_id', $supplier)->sum('quantity');
        }

        $supplierorder_values = array_values($supplierorder_values);

        return view('main.home', compact('user', 'inventories', 'suppliercount', 'productcount', 'inventorycount', 'customercount', 'months_values', 'customerorder_values', 'supplierorder_values', 'arrived_suppliers', 'supplierorder_values'));
    }
}

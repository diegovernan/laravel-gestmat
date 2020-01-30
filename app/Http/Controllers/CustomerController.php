<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $customers = Customer::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('register.customers', compact('customers'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->user_id = auth()->user()->id;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;

        $customer->save();

        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Customer $customer)
    {
        return view('register.customer-edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->user_id = auth()->user()->id;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;

        $customer->save();

        return redirect()->back()->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->back()->with('success', 'Cliente excluído com sucesso!');
    }
}

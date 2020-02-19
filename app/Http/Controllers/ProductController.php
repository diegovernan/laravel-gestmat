<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('register.products', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->name = $request->name;
        $product->cost_price = str_replace(",", ".", $request->cost_price);
        $product->sale_price = str_replace(",", ".", $request->sale_price);

        $product->save();

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Product $product)
    {
        return view('register.product-edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->user_id = auth()->user()->id;
        $product->name = $request->name;
        $product->cost_price = str_replace(",", ".", $request->cost_price);
        $product->sale_price = str_replace(",", ".", $request->sale_price);

        $product->save();

        return redirect()->back()->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }
}

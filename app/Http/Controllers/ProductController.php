<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name', 'id')->prepend('Selecione...', '');

        return view('products.form', compact('product', 'categories'));

    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
        
            Product::create($params);

            return redirect()->route('products.index');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->prepend('Selecione...', '');

        return view('products.form', compact('product', 'categories')); 
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $product = Product::find($id);


            $product->fill($params);
            $product->save();

            return redirect()->route('products.index');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}

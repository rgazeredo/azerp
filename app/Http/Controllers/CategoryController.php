<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Line;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        $lines = Line::pluck('name', 'id')->prepend('Selecione...', '');

        return view('categories.form', compact('category', 'lines'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            Category::create($params);

            return redirect()->route('categories.index');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $lines = Line::pluck('name', 'id')->prepend('Selecione...', '');

        return view('categories.form', compact('category', 'lines'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $category = Category::find($id);
            $category->fill($params);
            $category->save();

            return redirect()->route('categories.index');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}

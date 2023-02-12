<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function index()
    {
        $lines = Line::all();

        return view('lines.index', compact('lines'));
    }

    public function create()
    {
        $line = new Line();

        return view('lines.form', compact('line'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            Line::create($params);

            return redirect()->route('lines.index');
        }
    }

    public function edit($id)
    {
        $line = Line::find($id);

        return view('lines.form', compact('line'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $line = Line::find($id);
            $line->fill($params);
            $line->save();

            return redirect()->route('lines.index');
        }
    }

    public function destroy($id)
    {
        $line = Line::find($id);
        $line->delete();

        return redirect()->route('lines.index');
    }
}

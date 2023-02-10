<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();

        return view('sectors.index', compact('sectors'));
    }

    public function create()
    {
        $sector = new Sector();

        return view('sectors.form', compact('sector'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            Sector::create($params);

            return redirect()->route('sectors.index');
        }
    }

    public function edit($id)
    {
        $sector = Sector::find($id);

        return view('sectors.form', compact('sector'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $sector = Sector::find($id);
            $sector->fill($params);
            $sector->save();

            return redirect()->route('sectors.index');
        }
    }

    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();

        return redirect()->route('sectors.index');
    }
}

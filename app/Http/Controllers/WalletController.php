<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::all();

        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        $wallet = new Wallet();

        return view('wallets.form', compact('wallet'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            Wallet::create($params);

            return redirect()->route('wallets.index');
        }
    }

    public function edit($id)
    {
        $wallet = Wallet::find($id);

        return view('wallets.form', compact('wallet'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $wallet = Wallet::find($id);
            $wallet->fill($params);
            $wallet->save();

            return redirect()->route('wallets.index');
        }
    }

    public function destroy($id)
    {
        $wallet = Wallet::find($id);
        $wallet->delete();

        return redirect()->route('wallets.index');
    }
}

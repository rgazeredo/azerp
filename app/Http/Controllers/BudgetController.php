<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::get();

        return view('admin.budgets.index', compact('budgets'));
    }

    public function create(Customer $customer)
    {
        $budget = new Budget();

        return view('admin.budgets.form', compact('budget', 'customer'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['user_id'] = Auth::user()->id;
            $params['customer_id'] = Auth::user()->id;


            Budget::create($params);

            return redirect()->route('admin.budgets.index');
        }
    }

    public function edit($id)
    {
        $budget = Budget::find($id);

        return view('admin.budgets.form', compact('budget'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $budget = Budget::find($id);
            $budget->fill($params);
            $budget->save();

            return redirect()->route('admin.budgets.index');
        }
    }

    public function destroy($id)
    {
        $budget = Budget::find($id);
        $budget->delete();

        return redirect()->route('admin.budgets.index');
    }
}

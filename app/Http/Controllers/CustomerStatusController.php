<?php

namespace App\Http\Controllers;

use App\Models\CustomerStatus;
use Illuminate\Http\Request;

class CustomerStatusController extends Controller
{
    public function index()
    {
        $customerStatuses = CustomerStatus::all();

        return view('customerStatuses.index', compact('customerStatuses'));
    }

    public function create()
    {
        $customerStatus = new CustomerStatus();

        return view('customerStatuses.form', compact('customerStatus'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            CustomerStatus::create($params);

            return redirect()->route('customer.statuses.index');
        }
    }

    public function edit($id)
    {
        $customerStatus = CustomerStatus::find($id);

        return view('customerStatuses.form', compact('customerStatus'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customerStatus = CustomerStatus::find($id);
            $customerStatus->fill($params);
            $customerStatus->save();

            return redirect()->route('customer.statuses.index');
        }
    }

    public function destroy($id)
    {
        $customerStatus = CustomerStatus::find($id);
        $customerStatus->delete();

        return redirect()->route('customer.statuses.index');
    }
}

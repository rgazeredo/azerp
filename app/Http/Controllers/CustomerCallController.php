<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCall;
use Illuminate\Http\Request;

class CustomerCallController extends Controller
{
    public function index($customerId)
    {
        $customer = Customer::find($customerId);
        $customerCalls = CustomerCall::where('customer_id', $customerId)->get();

        return view('admin.customerCalls.index', compact('customer', 'customerId', 'customerCalls'));
    }

    public function create($customerId)
    {
        $customer = Customer::find($customerId);
        $customerCalls = new CustomerCall();

        return view('admin.customerCalls.form', compact('customer', 'customerCalls'));
    }

    public function store($customerId, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['customer_id'] = $customerId;
            $customerCalls = CustomerCall::create($params);

            return redirect()->route('admin.customers.calls.index', $customerId);
        }
    }

    public function edit($customerId, $id)
    {
        $customer = Customer::find($customerId);
        $customerCall = CustomerCall::find($id);

        return view('admin.customerCalls.form', compact('customer', 'customerCall'));
    }

    public function update($customerId, $id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customerCalls = CustomerCall::find($id);
            $customerCalls->fill($params);
            $customerCalls->save();

            return redirect()->route('admin.customers.calls.index', $customerId);
        }
    }

    public function destroy($customerId, $id)
    {
        $customerCalls = CustomerCall::find($id);
        $customerCalls->delete();

        return redirect()->route('admin.customers.calls.index', $customerId);
    }

    public function show($customerId)
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    public function index($customerId)
    {
        $customer = Customer::find($customerId);
        $customerAddresses = CustomerAddress::where('customer_id', $customerId)->get();

        return view('admin.customerAddresses.index', compact('customer', 'customerId', 'customerAddresses'));
    }

    public function create($customerId)
    {
        $customer = Customer::find($customerId);
        $customerAddress = new CustomerAddress();

        return view('admin.customerAddresses.form', compact('customer', 'customerAddress'));
    }

    public function store($customerId, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['customer_id'] = $customerId;
            $customerAddress = CustomerAddress::create($params);

            return redirect()->route('admin.customers.addresses.index', $customerId);
        }
    }

    public function edit($customerId, $id)
    {
        $customer = Customer::find($customerId);
        $customerAddress = CustomerAddress::find($id);

        return view('admin.customerAddresses.form', compact('customer', 'customerAddress'));
    }

    public function update($customerId, $id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customerAddress = CustomerAddress::find($id);
            $customerAddress->fill($params);
            $customerAddress->save();

            return redirect()->route('admin.customers.addresses.index', $customerId);
        }
    }

    public function destroy($customerId, $id)
    {
        $customerAddress = CustomerAddress::find($id);
        $customerAddress->delete();

        return redirect()->route('admin.customers.addresses.index', $customerId);
    }

    public function show($customerId)
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerContact;
use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    public function index($customerId)
    {
        $customer = Customer::find($customerId);
        $customerPhones = CustomerContact::where('customer_id', $customerId)->get();

        return view('customerContacts.index', compact('customer', 'customerId', 'customerPhones'));
    }

    public function create($customerId)
    {
        $customer = Customer::find($customerId);
        $customerPhone = new CustomerContact();

        return view('customerContacts.form', compact('customer', 'customerPhone'));
    }

    public function store($customerId, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['customer_id'] = $customerId;
            $customerPhone = CustomerContact::create($params);

            return redirect()->route('customers.contacts.index', $customerId);
        }
    }

    public function edit($customerId, $id)
    {
        $customer = Customer::find($customerId);
        $customerPhone = CustomerContact::find($id);

        return view('customerContacts.form', compact('customer', 'customerPhone'));
    }

    public function update($customerId, $id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customerPhone = CustomerContact::find($id);
            $customerPhone->fill($params);
            $customerPhone->save();

            return redirect()->route('customers.contacts.index', $customerId);
        }
    }

    public function destroy($customerId, $id)
    {
        $customerPhone = CustomerContact::find($id);
        $customerPhone->delete();

        return redirect()->route('customers.contacts.index', $customerId);
    }

    public function show($customerId)
    {
    }
}

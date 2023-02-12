<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    public function index()
    {
        $customerProfiles = CustomerProfile::all();

        return view('customerProfiles.index', compact('customerProfiles'));
    }

    public function create()
    {
        $customerProfile = new CustomerProfile();

        return view('customerProfiles.form', compact('customerProfile'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            CustomerProfile::create($params);

            return redirect()->route('customer.profiles.index');
        }
    }

    public function edit($id)
    {
        $customerProfile = CustomerProfile::find($id);

        return view('customerProfiles.form', compact('customerProfile'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customerProfile = CustomerProfile::find($id);
            $customerProfile->fill($params);
            $customerProfile->save();

            return redirect()->route('customer.profiles.index');
        }
    }

    public function destroy($id)
    {
        $customerProfile = CustomerProfile::find($id);
        $customerProfile->delete();

        return redirect()->route('customer.profiles.index');
    }
}

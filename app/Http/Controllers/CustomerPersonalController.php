<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerProfile;
use App\Models\CustomerStatus;
use App\Models\Sector;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPersonalController extends Controller
{
    public function index()
    {
        $customers = Customer::where('type', 'PF')->get();

        return view('customerPersonals.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        $customerProfiles = CustomerProfile::pluck('name', 'id')->prepend('Selecione...', '');
        $customerStatuses = CustomerStatus::pluck('name', 'id')->prepend('Selecione...', '');
        $sectors = Sector::pluck('name', 'id')->prepend('Selecione...', '');
        $wallets = Wallet::pluck('name', 'id')->prepend('Selecione...', '');

        return view('customerPersonals.form', compact('customer', 'customerProfiles', 'customerStatuses', 'sectors', 'wallets'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['owner_id'] = Auth::user()->id;
            $params['user_id'] = Auth::user()->id;
            $params['type'] = 'PF';
            $params['whatsapp'] = empty($params['whatsapp']) ? $params['whatsapp'] = false : $params['whatsapp'] = true;
            $params['ipi_immune'] = false;
            $params['approved_product'] = empty($params['approved_product']) ? $params['approved_product'] = false : $params['approved_product'] = true;
            $params['credit'] = empty($params['credit']) ? $params['credit'] = false : $params['credit'] = true;
            $params['discount'] = empty($params['discount']) ? $params['discount'] = false : $params['discount'] = true;

            if (empty($params['sector_id'])) {
                $sector = Sector::where('slug', 'vendas')->first();
                $params['sector_id'] = $sector->id;
            }

            if (empty($params['wallet_id'])) {
                $wallet = Wallet::where('slug', 'vendas-1')->first();
                $params['wallet_id'] = $wallet->id;
            }
            Customer::create($params);

            return redirect()->route('customer-personals.index');
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $customerProfiles = CustomerProfile::pluck('name', 'id')->prepend('Selecione...', '');
        $customerStatuses = CustomerStatus::pluck('name', 'id')->prepend('Selecione...', '');
        $sectors = Sector::pluck('name', 'id')->prepend('Selecione...', '');
        $wallets = Wallet::pluck('name', 'id')->prepend('Selecione...', '');

        return view('customerPersonals.form', compact('customer', 'customerProfiles', 'customerStatuses', 'sectors', 'wallets'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customer = Customer::find($id);
            $customer->fill($params);
            $customer->save();

            return redirect()->route('customer-personals.index');
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customer-personals.index');
    }
}

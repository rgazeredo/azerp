<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerProfile;
use App\Models\CustomerStatus;
use App\Models\Sector;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCompanyController extends Controller
{
    public function index()
    {
        $customers = Customer::where('type', 'PJ')->get();

        return view('customerCompanies.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        $customerProfiles = CustomerProfile::pluck('name', 'id')->prepend('Selecione...', '');
        $customerStatuses = CustomerStatus::pluck('name', 'id')->prepend('Selecione...', '');
        $sectors = Sector::pluck('name', 'id')->prepend('Selecione...', '');
        $wallets = Wallet::pluck('name', 'id')->prepend('Selecione...', '');

        return view('customerCompanies.form', compact('customer', 'customerProfiles', 'customerStatuses', 'sectors', 'wallets'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        if ($params) {
            $params['owner_id'] = Auth::user()->id;
            $params['user_id'] = Auth::user()->id;
            $params['type'] = 'PJ';
            $params['whatsapp'] = empty($params['whatsapp']) ? $params['whatsapp'] = false : $params['whatsapp'] = true;
            $params['ipi_immune'] = empty($params['ipi_immune']) ? $params['ipi_immune'] = false : $params['ipi_immune'] = true;
            $params['approved_product'] = empty($params['approved_product']) ? $params['approved_product'] = false : $params['approved_product'] = true;
            $params['credit'] = empty($params['credit']) ? $params['credit'] = false : $params['credit'] = true;
            $params['discount'] = empty($params['discount']) ? $params['discount'] = false : $params['discount'] = true;

            if (empty($params['sector_id'])) {
                $sector = Sector::where('slug', 'vendas-corporativas')->first();
                $params['sector_id'] = $sector->id;
            }

            if (empty($params['wallet_id'])) {
                $wallet = Wallet::where('slug', 'vendas-2')->first();
                $params['wallet_id'] = $wallet->id;
            }

            $customer = Customer::create($params);

            if (!empty($params['street'])) {
                CustomerAddress::create([
                    'customer_id' => $customer->id,
                    'name' => 'MATRIZ',
                    'street' => $params['street'],
                    'number' => $params['number'],
                    'complement' => $params['complement'],
                    'district' => $params['district'],
                    'city' => $params['city'],
                    'state' => $params['state'],
                    'zipcode' => $params['zipcode'],
                ]);
            }

            return redirect()->route('customer-companies.index');
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $customerProfiles = CustomerProfile::pluck('name', 'id')->prepend('Selecione...', '');
        $customerStatuses = CustomerStatus::pluck('name', 'id')->prepend('Selecione...', '');
        $sectors = Sector::pluck('name', 'id')->prepend('Selecione...', '');
        $wallets = Wallet::pluck('name', 'id')->prepend('Selecione...', '');

        return view('customerCompanies.form', compact('customer', 'customerProfiles', 'customerStatuses', 'sectors', 'wallets'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();

        if ($params) {
            $customer = Customer::find($id);
            $customer->fill($params);
            $customer->save();

            return redirect()->route('customer-companies.index');
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect()->route('customer-companies.index');
    }

    public function apiEin(Request $request)
    {
        $params = $request->all();
        $ein = preg_replace('/\D/', '', $params['ein']);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://receitaws.com.br/v1/cnpj/' . $ein);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }


        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            return json_decode($result);
        }

        curl_close($ch);
    }
    public function apiZipcode(Request $request)
    {
        $params = $request->all();
        $zipcode = preg_replace('/\D/', '', $params['zipcode']);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'viacep.com.br/ws/' . $zipcode . '/json/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }


        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            return json_decode($result);
        }

        curl_close($ch);
    }
}

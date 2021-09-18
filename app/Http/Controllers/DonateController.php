<?php

namespace App\Http\Controllers;

use config;
use App\Models\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $url = config('services.toyyibpay.url')."getBanks";
        // dd($url);
        return view('donate.index');
    }

    public function bank(Donate $donate)
    {
        $billCode = $donate->toyyibPay_bill_code;
        $url = config('services.toyyibpay.url')."getBankFPX";

        $response = Http::get($url);
        $banks = $response->json();

        return view('donate.payment', compact('billCode', 'banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|min:1',
        ]);

        // multiply input amount with 100
        $amount = $request->amount * 100;

        // store donation
        $donate = Donate::create([
            // 'user_id' => auth()->user()->id ?? null,
            'name' => auth()->user()->name ?? $request->name,
            'email' => auth()->user()->email ?? $request->email,
            'phone' => $request->phone,
            'amount' => $amount,
        ]);

        // dd($request->all());
        // Get current device host
        $host = $request->getSchemeAndHttpHost();

        $toyyibpay_secret_key = config('services.toyyibpay.secret');

        // create bill at toyyibpay
        $url = config('services.toyyibpay.url')."createBill";
        // $url = 'https://toyyibpay.com/index.php/api/createBill';

        $response = Http::asForm()->post($url, [
            'userSecretKey' => $toyyibpay_secret_key,
            'categoryCode' => 'ngyst0c1',
            'billName' => auth()->user()->name ?? $request->name,
            'billDescription' => 'Donation from '.$request->name,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $amount,
            // 'billReturnUrl' => $host.'/return-url',
            'billReturnUrl' => route('return-url'),
            // 'billCallbackUrl' => $host.'/call-back-url',
            'billCallbackUrl' => route('callback-url'),
            'billExternalReferenceNo' => $donate->uuid.$donate->id,
            'billTo' => auth()->user()->name ?? $request->name,
            'billEmail' => auth()->user()->email ?? $request->email,
            'billPhone' => $request->phone,
            'billContentEmail'=>'Thank you for donating!',
        ]);
        // dd($response->json());
        // update purchase with toyyibPay bill code
        $donate->update([
            'toyyibPay_bill_code' => $response->json()[0]['BillCode'],
        ]);

        return redirect()->route('donate:bank', $donate);
    }

    public function payBank(Request $request)
    {
        $toyyibpay_secret_key = config('services.toyyibpay.secret');
        $url = config('services.toyyibpay.url')."runBill";
        
        $response = Http::asForm()->post($url, [
            'userSecretKey' => $toyyibpay_secret_key,
            'billCode' => $request->billCode,
            // 'billpaymentAmount' => $donate->amount,
            // 'billpaymentPayorName' => auth()->user()->name,
            // 'billpaymentPayorPhone' => '0124441998',
            // 'billpaymentPayorEmail' => auth()->user()->email,
            'billBankID' => $request->bankID,
        ]);

        return $response; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function show(Donate $donate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function edit(Donate $donate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donate $donate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donate $donate)
    {
        //
    }
}

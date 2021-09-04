<?php

namespace App\Http\Controllers;

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
        return view('donate.index');
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
        // multiply input amount with 100
        $amount = $request->amount * 100;

        // store donation
        $donate = Donate::create([
            'user_id' => auth()->user()->id,
            'amount' => $amount,
        ]);

        // create bill at toyyibpay
        $url = 'https://dev.toyyibpay.com/index.php/api/createBill';

        $response = Http::asForm()->post($url, [
            'userSecretKey' => 'czbbbpan-1b56-8is1-65cl-wjoun02tycye',
            'categoryCode' => 'rbvw3ia4',
            'billName' => auth()->user()->name,
            'billDescription' => 'Donation from '.auth()->user()->name,
            'billPriceSetting' => 1,
            'billAmount' => $amount,
            'billReturnUrl' => 'http://127.0.0.1:8888/return-url',
            'billCallbackUrl' => 'http://127.0.0.1:8888/call-back-url',
            'billExternalReferenceNo' => $donate->id,
            'billTo' => auth()->user()->name,
            'billEmail' => auth()->user()->email,
            'billPhone' => '0124441998',
        ]);

        // update purchase with toyyibPay bill code
        $donate->update([
            'toyyibPay_bill_code' => $response->json()[0]['BillCode'],
        ]);

        return 'https://dev.toyyibpay.com/'.$donate->toyyibPay_bill_code;
        // return redirect()->route('home');
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

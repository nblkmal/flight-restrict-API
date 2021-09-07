<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index(Request $request)
    {
        $donate = Donate::where('toyyibpay_bill_code', $request->billcode)->first();
        $donater = $request->name;

        if($donate){ 
            if($donate->uuid.$donate->id == $request->order_id){
                $donate->update(['payment_status'=>1]);
    
                return view('donate.paid', compact('donater'));
            }
            return view('donate.try', compact('donate'));
        }
        else
        {
            return 'Please check your response';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function index(Request $request)
    {
        \info(['from payment gateway' => $request->all()]);

        $donate = Donate::where('toyyibpay_bill_code', $request->billcode)->first();

        if($donate){
            if($donate->uuid == $request->order_id){
                $donate->update(['payment_status'=>1]);
    
                \info(['success' => 'update order success']);
            }
    
            \info(['failed' => 'respond is not valid']);
        }
        else
        {
            \info(['failed' => 'failed']);
        }
    }
}

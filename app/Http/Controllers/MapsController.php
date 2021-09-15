<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapsController extends Controller
{
    public function index()
    {
        $url = 'http://127.0.0.1:8080/api/v1/getPlaces';
        // dd($url);
        // $response = Http::withHeaders([
        //         'Accept' => 'application/json',
        
        //     ])->get($url);
        // dd($response->json());

        return view('map.index');
    }
}

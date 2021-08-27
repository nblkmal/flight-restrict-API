<?php

namespace App\Http\Controllers\API;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('type')->get();

        // dd($places);
        return response()->json([
            'success' => true,
            'message' => 'Success fetch all users',
            'data' => $places
        ]);
    }
}

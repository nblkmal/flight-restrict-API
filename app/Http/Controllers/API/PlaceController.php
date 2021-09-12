<?php

namespace App\Http\Controllers\API;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Imports\PlacesImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->search)
        if($request->search)
        {
            $places = Place::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $places = Place::with('type', 'coordinates')->get();
        }
        // dd($places);
        return response()->json([
            'success' => true,
            'message' => 'Success fetch all places',
            'data' => $places
        ]);
    }
}

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
            $places = Place::with('type')->get();
        }
        // dd($places);
        return response()->json([
            'success' => true,
            'message' => 'Success fetch all places',
            'data' => $places
        ]);
    }

    public function fileImportExport()
    {
        return view('file.import');
    }

    public function fileImport(Request $request) 
    {
        Excel::import(new PlacesImport, $request->file('file')->store('temp'));
        return back();
    }
}

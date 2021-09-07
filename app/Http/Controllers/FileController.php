<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PlacesExport;
use App\Exports\StatesExport;
use App\Imports\PlacesImport;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    //
    public function index()
    {
        return view('file.import');
    }

    public function places(Request $request)
    {
        Excel::import(new PlacesImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Succesfully Added');;
    }

    public function placesExport()
    {
        return Excel::download(new PlacesExport, 'places.xlsx');
    }

    public function statesExport()
    {
        return Excel::download(new StatesExport, 'states.xlsx');
    }
}

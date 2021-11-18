<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PlaceDataTable;

class PlaceController extends Controller
{
    public function index(PlaceDataTable $dataTable)
    {
        return $dataTable->render('places.index');
    }
}

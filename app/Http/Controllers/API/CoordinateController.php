<?php

namespace App\Http\Controllers\API;

use App\Models\Coordinate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoordinateController extends Controller
{
    public function index(Request $request)
    {
        if($request->search)
        {
            $cars = Coordinate::where('name', 'LIKE', '%'.$request->search.'%');
        } else {
            $coordinates = Coordinate::with('place.type')->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Success fetch all coordinates',
            'data' => $coordinates
        ]);
    }
}

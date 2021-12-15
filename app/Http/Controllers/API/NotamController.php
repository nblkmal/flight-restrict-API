<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\NotamLocation;
use App\Http\Controllers\Controller;

class NotamController extends Controller
{
    public function location()
    {
        $location = NotamLocation::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Success fetch all coordinates',
            'data' => $location
        ]);
    }
}

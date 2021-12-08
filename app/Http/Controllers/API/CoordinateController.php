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
            $coordinates = Coordinate::where('name', 'LIKE', '%'.$request->search.'%');
        } else {
            $coordinates = Coordinate::with('place.type')->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Success fetch all coordinates',
            'data' => $coordinates
        ]);
    }

    public function geoJson(Request $request)
    {
        if($request->search)
        {
            $coordinates = Coordinate::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $coordinates = Coordinate::with('place.type')->get();
        }
        
        $features = array();
        foreach($coordinates as $key => $coordinate)
        {
            $features[] = array(
                'type' => 'Feature',
                'properties' => array('name' => $coordinate->place->name),
                'geometry' => array(
                    'type' => $coordinate->place->type->name,
                    'coordinates' => [
                        $coordinate->longitude, $coordinate->latitude
                    ],
                ),
            );
        }

        $geojson = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );

        return response()->json([
            'success' => true,
            'message' => 'Success fetch all places',
            'data' => $geojson
        ]);
    }
}

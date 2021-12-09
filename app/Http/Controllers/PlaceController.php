<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;
use App\DataTables\PlaceDataTable;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index(PlaceDataTable $dataTable)
    {
        return $dataTable->render('places.index');
    }

    public function geoJsonExport()
    {
        $coordinates = Coordinate::with('place.type')->get();
        
        $features = array();
        foreach($coordinates as $key => $coordinate)
        {
            $features[] = array(
                'type' => 'Feature',
                'properties' => array(
                    'name' => $coordinate->place->name,
                    'category' => $coordinate->place->category->name,
                ),
                'geometry' => array(
                    'type' => $coordinate->place->type->name,
                    'coordinates' => [
                        floatval($coordinate->longitude), floatval($coordinate->latitude)
                    ],
                ),
            );
        }

        $geojson = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );

        $encoded = json_encode($geojson);
        $fileName = time() . '_datafile.geojson';

        // need to mention which disk if using storage
        $test = Storage::disk('public')->put('storage/upload/json/'.$fileName, $encoded);

        return Storage::disk('public')->download('storage/upload/json/'.$fileName);
    }
}

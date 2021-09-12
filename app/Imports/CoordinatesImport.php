<?php

namespace App\Imports;

use App\Models\Coordinate;
use Maatwebsite\Excel\Concerns\ToModel;

class CoordinatesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Coordinate([
            'latitude' => $row[0],
            'longitude' => $row[1],
            'place_id' => $row[2]
        ]);
    }
}

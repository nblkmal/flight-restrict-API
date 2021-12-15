<?php

namespace App\Imports;

use App\Models\NotamLocation;
use Maatwebsite\Excel\Concerns\ToModel;

class NotamLocationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NotamLocation([
            'code' => $row[0],
            'location' => $row[1],
        ]);
    }
}

<?php

namespace App\Models;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coordinate extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'place_id',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
        'type_id',
        'category_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function coordinates()
    {
        return $this->hasMany(Coordinate::class);
    }

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

}

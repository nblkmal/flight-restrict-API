<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}

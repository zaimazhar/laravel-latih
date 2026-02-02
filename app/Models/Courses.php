<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function getPriceAttribute($value)
    {
        // convert from 50000 to 500.00
        return $value / 100;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Money\Money;

class Course extends Model
{
    protected $fillable = [
        'name',
        'price',
        'currency',
        // Define fillable attributes here
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected function getPriceAttribute($value)
    {
        return Money::{$this->currency}($value);
    }
}

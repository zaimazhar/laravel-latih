<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}

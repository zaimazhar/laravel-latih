<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    // Define fillable attributes here
    protected $fillable = [
        'course_id',
        'status',
        'remarks',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}

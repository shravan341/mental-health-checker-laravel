<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'answers',
        'result',
        'advice',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    /**
     * Get the user that owns the assessment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

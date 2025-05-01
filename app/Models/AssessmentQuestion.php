<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    protected $fillable = [
        'question',
        'type',
        'options',
        'order',
    ];

    protected $casts = [
        'options' => 'array',
    ];
}

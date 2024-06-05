<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'rank',
        'active'
    ];
    protected $casts = [
        'question' => 'array', // Cast the name attribute to an array
        'answer' => 'array', // Cast the name attribute to an array
        'active' => 'boolean', // Cast the active attribute to a boolean
    ];
}

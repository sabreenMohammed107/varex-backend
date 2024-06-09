<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'description'
    ];
    protected $casts = [
        'title' => 'array', // Cast the title attribute to an array
        'description' => 'array', // Cast the description attribute to an array

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarexMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'vedio_link',
        'title',
        'description',
        'image'
    ];
    protected $casts = [
        'description' => 'array', // Cast the name attribute to an array
        'title' => 'array', // Cast the name attribute to an array
    ];

}

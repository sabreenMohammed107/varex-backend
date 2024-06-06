<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',

    ];
    protected $casts = [
        'title' => 'array', // Cast the title attribute to an array
    ];

}

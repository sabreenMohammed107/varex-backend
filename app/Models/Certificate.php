<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'image', 'rank', 'active'];

    protected $casts = [
        'name' => 'array', // Cast the name attribute to an array
        'active' => 'boolean', // Cast the active attribute to a boolean
    ];

}

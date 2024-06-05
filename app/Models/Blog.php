<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'publish_date',
        'main_image',
        'featured_image',
        'description',
        'master',
        'active',
        'featured'
    ];
}

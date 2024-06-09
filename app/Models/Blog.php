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
        'publish_date',
        'main_image',
        'featured_image',
        'description',
        'master',
        'active',
        'featured',
        'category_id',
    ];
    protected $casts = [
        'title' => 'array', // Cast the title attribute to an array
        'slug' => 'array', // Cast the slug attribute to an array
        'description' => 'array', // Cast the description attribute to an array
        'active' => 'boolean', // Cast the active attribute to a boolean
        'master' => 'boolean', // Cast the master attribute to a boolean
        'featured' => 'boolean', // Cast the featured attribute to a boolean
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

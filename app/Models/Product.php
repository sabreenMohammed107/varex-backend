<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'home_title',
        'title',
        'description',
        'main_image',
        'fully_qr_image',
        'qr_image',
        'tags',
        'category_id',
        'rank',
        'popular',
        'slider',
        'featured',
        'best_selling',
        'featured_text_ar',
        'featured_text_en',
        'video_link',
        'slug',
        'tag_id',
    ];

    protected $casts = [
        'home_title' => 'array',
        'title' => 'array',
        'description' => 'array',
        'tags' => 'array',
        'popular' => 'boolean',
        'slider' => 'boolean',
        'featured' => 'boolean',
        'best_selling' => 'boolean',
        'slug' => 'array',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function imageGalleries(){
        return $this->hasMany(ImageGallery::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }


    // Add other model methods...
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;

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
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imageGalleries()
    {
        return $this->hasMany(ImageGallery::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug_en = self::generateUniqueSlug($product, 'en');
            $product->slug_ar = self::generateUniqueSlug($product, 'ar');
        });

        static::updating(function ($product) {
            if ($product->isDirty('title')) {
                $product->slug_en = self::generateUniqueSlug($product, 'en');
                $product->slug_ar = self::generateUniqueSlug($product, 'ar');
            }
        });
    }

    protected static function generateUniqueSlug($product, $locale)
    {
        $baseSlug = Str::slug($product->title[$locale]);
        $slug = $baseSlug;
        $count = 1;

        while (self::where('slug_' . $locale, $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

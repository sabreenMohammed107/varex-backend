<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'about_title',
        'about_sub_title',
        'about_description',
        'manager_name',
        'manager_position',
        'company_katalog',
        'about_banner_text',
        'mission_title',
        'mission_sub_title',
        'mission_description',
        'vision_title',
        'vision_description',
        'quality_title',
        'quality_description',
        'seo_description',
        'image',
        'mission_image',
        'vision_image',
        'quality_image',

    ];

    protected $casts = [
        'about_title' => 'array',
        'about_sub_title' => 'array',
        'about_description' => 'array',
        'manager_name' => 'array',
        'manager_position' => 'array',
        'about_banner_text' => 'array',
        'mission_title' => 'array',
        'mission_sub_title' => 'array',
        'mission_description' => 'array',
        'vision_title' => 'array',
        'vision_description' => 'json',
         'quality_title' => 'array',
        'quality_description' => 'json',
         'seo_description' => 'json'
    ];
}

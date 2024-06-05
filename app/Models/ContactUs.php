<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'email1',
        'email2',
        'sales_phone',
        'service_support_phone',
        'whatsapp',
        'g_map',
        'location',
        'facebook',
        'twitter',
        'instagram'
    ];
    protected $casts = [
        'location' => 'array', // Cast the location attribute to an array
    ];
}

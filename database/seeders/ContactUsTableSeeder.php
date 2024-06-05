<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_us')->insert([
            'email1' => 'mibrahem@varex.com.eg',
            'email2' => 'support@varex.com.eg',
            'sales_phone' => '+201006069642',
            'service_support_phone' => '+201550332200',
            'whatsapp' => '+201006069642',
            'g_map' => 'https://maps.google.com/?q=example+location',
            'location' => json_encode([
                'ar' => '٣٢ عمر ابن عبد العزيز، حلوان',
                'en' => '32 Omar Ibn Abd El Azeez, Helwan'
            ]),
            'facebook' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'instagram' => 'https://instagram.com/example',
        ]);
    }
}

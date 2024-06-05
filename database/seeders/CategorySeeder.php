<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => json_encode(['en' => 'Beauty', 'ar' => 'الجمال']),
                'icon' => 'uploads/category/beauty.png',
                'rank' => 1,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Power Of Steel', 'ar' => 'قوة الفولاذ']),
                'icon' => 'uploads/category/power_of_steel.png',
                'rank' => 2,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Scrubber Sponge', 'ar' => 'اسفنجة الفرك']),
                'icon' => 'uploads/category/scrubber_sponge.png',
                'rank' => 3,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Towel', 'ar' => 'منشفة']),
                'icon' => 'uploads/category/towel.png',
                'rank' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'House Tools', 'ar' => 'أدوات منزلية']),
                'icon' => 'uploads/category/house_tools.png',
                'rank' => 5,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Premium Scrubber Sponge', 'ar' => 'اسفنجة الفرك الممتازة']),
                'icon' => 'uploads/category/premium_scrubber_sponge.png',
                'rank' => 6,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Luffa Bath', 'ar' => 'حمام اللوفا']),
                'icon' => 'uploads/category/luffa_bath.png',
                'rank' => 7,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Plastic Scrubber Sponge', 'ar' => 'اسفنجة الفرك البلاستيكية']),
                'icon' => 'uploads/category/plastic_scrubber_sponge.png',
                'rank' => 8,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Super Abrasive For Grills', 'ar' => 'مادة كاشطة فائقة للشوايات']),
                'icon' => 'uploads/category/super_abrasive_for_grills.png',
                'rank' => 9,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Liquid', 'ar' => 'سائل']),
                'icon' => 'uploads/category/liquid.png',
                'rank' => 10,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

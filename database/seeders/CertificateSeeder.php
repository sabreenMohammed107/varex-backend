<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('certificates')->insert([
            [
                'name' => json_encode(['en' => 'Certificate A', 'ar' => 'الشهادة أ']),
                'image' => 'uploads/certificate/certificateOne.jpeg',
                'rank' => 1,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Certificate B', 'ar' => 'الشهادة ب']),
                'image' => 'uploads/certificate/certificateTwo.jpeg',
                'rank' => 2,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Certificate C', 'ar' => 'الشهادة ج']),
                'image' => 'uploads/certificate/certificateThree.jpeg',
                'rank' => 3,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => json_encode(['en' => 'Certificate D', 'ar' => 'الشهادة ب']),
                'image' => 'uploads/certificate/certificateFour.jpeg',
                'rank' => 4,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}

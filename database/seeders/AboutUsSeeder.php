<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'about_title' => json_encode(['en' => 'About Us', 'fr' => 'À propos de nous']),
            'about_sub_title' => json_encode(['en' => 'Learn more about us', 'fr' => 'En savoir plus sur nous']),
            'about_description' => json_encode(['en' => 'We are a company that values...', 'fr' => 'Nous sommes une entreprise qui valorise...']),
            'manager_name' => json_encode(['en' => 'John Doe', 'fr' => 'Jean Dupont']),
            'manager_position' => json_encode(['en' => 'CEO', 'fr' => 'PDG']),
            'company_katalog' => 'path/to/katalog.pdf', // Update this line
            'about_banner_text' => json_encode(['en' => 'Welcome to our company', 'fr' => 'Bienvenue dans notre entreprise']),
            'mission_title' => json_encode(['en' => 'Our Mission', 'fr' => 'Notre mission']),
            'mission_sub_title' => json_encode(['en' => 'What we aim to achieve', 'fr' => 'Ce que nous visons à atteindre']),
            'mission_description' => json_encode(['en' => 'Our mission is to...', 'fr' => 'Notre mission est de...']),
            'vision_title' => json_encode(['en' => 'Our Vision', 'fr' => 'Notre vision']),
            'vision_description' => json_encode(['en' => 'Our vision is to...', 'fr' => 'Notre vision est de...']),
        ]);
    }
}

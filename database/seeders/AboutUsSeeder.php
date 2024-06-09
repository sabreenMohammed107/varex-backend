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
            'about_title' => json_encode(['en' => 'About Us', 'ar' => 'À propos de nous']),
            'about_sub_title' => json_encode(['en' => 'Learn more about us', 'ar' => 'En savoir plus sur nous']),
            'about_description' => json_encode(['en' => 'We are a company that values...', 'ar' => 'Nous sommes une entreprise qui valorise...']),
            'manager_name' => json_encode(['en' => 'John Doe', 'ar' => 'Jean Dupont']),
            'manager_position' => json_encode(['en' => 'CEO', 'ar' => 'PDG']),
            'company_katalog' => 'path/to/katalog.pdf', // Update this line
            'about_banner_text' => json_encode(['en' => 'Welcome to our company', 'ar' => 'Bienvenue dans notre entreprise']),
            'mission_title' => json_encode(['en' => 'Our Mission', 'ar' => 'Notre mission']),
            'mission_sub_title' => json_encode(['en' => 'What we aim to achieve', 'ar' => 'Ce que nous visons à atteindre']),
            'mission_description' => json_encode(['en' => 'Our mission is to...', 'ar' => 'Notre mission est de...']),
            'vision_title' => json_encode(['en' => 'Our Vision', 'ar' => 'Notre vision']),
            'vision_description' => json_encode(['en' => 'Our vision is to...', 'ar' => 'Notre vision est de...']),
            'quality_title' => json_encode(['en' => 'Change the perception of quality in the manufacturing of hygiene products.', 'ar' => 'Change the perception of quality in the manufacturing of hygiene products.']),
            'quality_description' => json_encode(['en' => 'Embrace a new era of excellence, where meticulous attention to detail and innovation redefine the very essence of quality in hygiene product manufacturing, setting unprecedented benchmarks for cleanliness and efficacy.', 'ar' => 'Embrace a new era of excellence, where meticulous attention to detail and innovation redefine the very essence of quality in hygiene product manufacturing, setting unprecedented benchmarks for cleanliness and efficacy.']),
            'seo_description' => json_encode(['en' => '<h4>With pride and honor, I am delighted to welcome you to the Varex website.</h4>
                <p>By exploring our website, you\'ll uncover our rich history and the tremendous effort put forth by our team, comprised of a rare blend of seasoned experts and talented youth, dedicated to their craft in the Egyptian market. Recognizing the paramount importance of our experts and colleagues as our greatest strength, I am indebted to them for their unwavering commitment, consistently joining me in the trenches of hard work, all aimed at developing the best and most suitable products that cater to the interests and desires of our customers in diverse markets.</p>
                <p>Furthermore, our website allows you to closely examine the values that our company has adhered to since its inception, values which we have never wavered from. These values stem from our steadfast belief in the principles of innovation and continuous improvement to develop the best products and ensure their sustainability. With all sincerity, I affirm that the products under the Varex brand are an industrial and technological achievement, positioning us at the forefront of the diverse market of kitchen sponges, scrubbers, and household cleaning tools in Egypt and the Arab world.</p>
                <p>In conclusion, it is my pleasure to personally commit to continuously building strong bridges of trust between ourselves, our distributors, customers, and colleagues across all levels and locations in local and international markets. We will always exert maximum effort to meet the high expectations of our colleagues and partners.</p>
                <h4>Once again, welcome to Varex online. We\'re delighted to have you here.</h4>', 'ar' => '<h4>With pride and honor, I am delighted to welcome you to the Varex website.</h4>
                <p>By exploring our website, you\'ll uncover our rich history and the tremendous effort put forth by our team, comprised of a rare blend of seasoned experts and talented youth, dedicated to their craft in the Egyptian market. Recognizing the paramount importance of our experts and colleagues as our greatest strength, I am indebted to them for their unwavering commitment, consistently joining me in the trenches of hard work, all aimed at developing the best and most suitable products that cater to the interests and desires of our customers in diverse markets.</p>
                <p>Furthermore, our website allows you to closely examine the values that our company has adhered to since its inception, values which we have never wavered from. These values stem from our steadfast belief in the principles of innovation and continuous improvement to develop the best products and ensure their sustainability. With all sincerity, I affirm that the products under the Varex brand are an industrial and technological achievement, positioning us at the forefront of the diverse market of kitchen sponges, scrubbers, and household cleaning tools in Egypt and the Arab world.</p>
                <p>In conclusion, it is my pleasure to personally commit to continuously building strong bridges of trust between ourselves, our distributors, customers, and colleagues across all levels and locations in local and international markets. We will always exert maximum effort to meet the high expectations of our colleagues and partners.</p>
                <h4>Once again, welcome to Varex online. We\'re delighted to have you here.</h4>']),
        ]);
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhyUsSeeder extends Seeder
{
    public function run()
    {
        DB::table('why_us')->insert([
            [
                'title' => json_encode([
                    'en' => 'Trusted Products',
                    'ar' => 'منتجات موثوقة'
                ]),
                'icon' => 'img/icons/protect.png',
                'description' => json_encode([
                    'en' => 'Introducing our line of Trusted Products! From household cleaners to industrial solutions, we offer reliable and effective cleaning solutions you can depend on. Shop now and experience the difference trusted quality makes!',
                    'ar' => 'تقديم خط منتجاتنا الموثوقة! من منظفات المنزل إلى الحلول الصناعية، نحن نقدم حلول تنظيف موثوقة وفعالة يمكنك الاعتماد عليها. تسوق الآن واختبر الفرق الذي تصنعه الجودة الموثوقة!'
                ])
            ],
            [
                'title' => json_encode([
                    'en' => 'Fast Delivery',
                    'ar' => 'توصيل سريع'
                ]),
                'icon' => 'img/icons/handle.png',
                'description' => json_encode([
                    'en' => 'Experience the unmatched speed of our Fast Delivery! With swift shipping and precise logistics, your orders arrive securely and swiftly. Trust in our commitment to deliver with unbeatable speed and reliability.',
                    'ar' => 'اختبر السرعة التي لا مثيل لها في توصيلنا السريع! مع الشحن السريع واللوجستيات الدقيقة، تصل طلباتك بأمان وسرعة. ثق في التزامنا بالتوصيل بسرعة وموثوقية لا تضاهى.'
                ])
            ],
            [
                'title' => json_encode([
                    'en' => '24/7 Support',
                    'ar' => 'دعم على مدار الساعة'
                ]),
                'icon' => 'img/icons/support-svgrepo-com 1.png',
                'description' => json_encode([
                    'en' => 'Rest assured with our unparalleled commitment to swift customer support, available round-the-clock. Our expert team is ready to assist you promptly, ensuring your questions and concerns are addressed promptly and efficiently, no matter the time of day or night.',
                    'ar' => 'كن مطمئنًا مع التزامنا الذي لا مثيل له بدعم العملاء السريع والمتاح على مدار الساعة. فريقنا الخبير جاهز لمساعدتك على الفور، لضمان معالجة أسئلتك ومخاوفك بسرعة وكفاءة، بغض النظر عن الوقت من النهار أو الليل.'
                ])
            ],
        ]);
    }
}

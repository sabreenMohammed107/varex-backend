<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question' => json_encode(['en' => 'What is the best way to clean a sponge?', 'ar' => 'ما هي أفضل طريقة لتنظيف الإسفنجة؟']),
                'answer' => json_encode(['en' => 'The best way to clean a sponge is to soak it in a mixture of vinegar and water, then microwave it for two minutes.', 'ar' => 'أفضل طريقة لتنظيف الإسفنجة هي نقعها في خليط من الخل والماء، ثم وضعها في الميكروويف لمدة دقيقتين.']),
                'rank' => 1,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'How often should I replace my cleaning sponge?', 'ar' => 'كم مرة يجب أن أستبدل إسفنجة التنظيف الخاصة بي؟']),
                'answer' => json_encode(['en' => 'It is recommended to replace your cleaning sponge every 1-2 weeks to prevent bacterial growth.', 'ar' => 'يوصى باستبدال إسفنجة التنظيف كل 1-2 أسبوع لمنع نمو البكتيريا.']),
                'rank' => 2,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'Can I use a sponge to clean glass surfaces?', 'ar' => 'هل يمكنني استخدام الإسفنجة لتنظيف الأسطح الزجاجية؟']),
                'answer' => json_encode(['en' => 'Yes, you can use a soft sponge to clean glass surfaces. Avoid using abrasive sponges as they can scratch the glass.', 'ar' => 'نعم، يمكنك استخدام إسفنجة ناعمة لتنظيف الأسطح الزجاجية. تجنب استخدام الإسفنجات الكاشطة لأنها قد تخدش الزجاج.']),
                'rank' => 3,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'What is the difference between a cellulose sponge and a synthetic sponge?', 'ar' => 'ما الفرق بين الإسفنجة السليلوزية والإسفنجة الاصطناعية؟']),
                'answer' => json_encode(['en' => 'Cellulose sponges are made from natural materials and are more absorbent, while synthetic sponges are made from plastic materials and are more durable.', 'ar' => 'الإسفنجات السليلوزية مصنوعة من مواد طبيعية وهي أكثر امتصاصًا، في حين أن الإسفنجات الاصطناعية مصنوعة من مواد بلاستيكية وهي أكثر متانة.']),
                'rank' => 4,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'How do I disinfect my cleaning sponge?', 'ar' => 'كيف أعقم إسفنجة التنظيف الخاصة بي؟']),
                'answer' => json_encode(['en' => 'You can disinfect your cleaning sponge by soaking it in a mixture of bleach and water for five minutes or by placing it in the dishwasher.', 'ar' => 'يمكنك تعقيم إسفنجة التنظيف الخاصة بك عن طريق نقعها في خليط من المبيض والماء لمدة خمس دقائق أو بوضعها في غسالة الأطباق.']),
                'rank' => 5,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'Can I use a sponge to clean non-stick cookware?', 'ar' => 'هل يمكنني استخدام الإسفنجة لتنظيف أواني الطهي غير اللاصقة؟']),
                'answer' => json_encode(['en' => 'Yes, use a soft sponge to clean non-stick cookware to avoid damaging the non-stick coating.', 'ar' => 'نعم، استخدم إسفنجة ناعمة لتنظيف أواني الطهي غير اللاصقة لتجنب إتلاف الطلاء غير اللاصق.']),
                'rank' => 6,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'What is a melamine sponge used for?', 'ar' => 'ما هو استخدام إسفنجة الميلامين؟']),
                'answer' => json_encode(['en' => 'A melamine sponge, also known as a magic eraser, is used to remove tough stains from various surfaces, including walls and floors.', 'ar' => 'إسفنجة الميلامين، والمعروفة أيضًا بالممحاة السحرية، تُستخدم لإزالة البقع الصعبة من مختلف الأسطح، بما في ذلك الجدران والأرضيات.']),
                'rank' => 7,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'How do I clean a sponge mop?', 'ar' => 'كيف أنظف ممسحة الإسفنجة؟']),
                'answer' => json_encode(['en' => 'To clean a sponge mop, remove the sponge head and rinse it thoroughly with hot water and a mild detergent.', 'ar' => 'لتنظيف ممسحة الإسفنجة، قم بإزالة رأس الإسفنجة واشطفه جيدًا بالماء الساخن والمنظف الخفيف.']),
                'rank' => 8,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'Are natural sponges better than synthetic ones?', 'ar' => 'هل الإسفنجات الطبيعية أفضل من الإسفنجات الاصطناعية؟']),
                'answer' => json_encode(['en' => 'Natural sponges are more environmentally friendly and biodegradable, but synthetic sponges are often more durable and less expensive.', 'ar' => 'الإسفنجات الطبيعية أكثر صداقة للبيئة وقابلة للتحلل الحيوي، ولكن الإسفنجات الاصطناعية غالبًا ما تكون أكثر متانة وأقل تكلفة.']),
                'rank' => 9,
                'active' => true,
            ],
            [
                'question' => json_encode(['en' => 'How should I store my cleaning sponges?', 'ar' => 'كيف يجب أن أخزن إسفنجات التنظيف الخاصة بي؟']),
                'answer' => json_encode(['en' => 'Store your cleaning sponges in a dry place to prevent bacterial growth. Make sure they are completely dry before storing.', 'ar' => 'قم بتخزين إسفنجات التنظيف الخاصة بك في مكان جاف لمنع نمو البكتيريا. تأكد من أنها جافة تمامًا قبل التخزين.']),
                'rank' => 10,
                'active' => true,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'nav1_ar', 'value' => 'الرئيسيه'],
            ['key' => 'nav1_en', 'value' => 'Home'],
            ['key' => 'nav2_ar', 'value' => 'من نحن'],
            ['key' => 'nav2_en', 'value' => 'About us'],
            ['key' => 'nav3_ar', 'value' => 'الخدمات'],
            ['key' => 'nav3_en', 'value' => 'Services'],
            ['key' => 'nav4_ar', 'value' => 'فريق العمل'],
            ['key' => 'nav4_en', 'value' => 'Team'],
            ['key' => 'nav5_ar', 'value' => 'الاعمال'],
            ['key' => 'nav5_en', 'value' => 'Works'],
            ['key' => 'nav6_ar', 'value' => 'وسائط التشغيل'],
            ['key' => 'nav6_en', 'value' => 'Media'],
            ['key' => 'nav7_ar', 'value' => 'اتصل بنا'],
            ['key' => 'nav7_en', 'value' => 'Contact us'],
            ['key' => 'video_link', 'value' => 'https://www.youtube.com/watch?v=0WC-tD-njcA'],
            ['key' => 'preview_background3', 'value' => '00_reviews.jpg'],
            ['key' => 'video_background4', 'value' => '01_video.jpg'],
            ['key' => 'review_title_ar', 'value' => 'تقيمات العملاء'],
            ['key' => 'review_title_en', 'value' => 'Client Reviews'],
            ['key' => 'contact_map_iframe', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14932162.856164385!2d36.05035290453929!3d23.976433629929215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1676227351957!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
            ['key' => 'about_exp_desc_ar', 'value' => 'سنوات من الخبرة في شركتنا'],
            ['key' => 'about_exp_desc_en', 'value' => 'Years Experience In Our Company'],
            ['key' => 'about_exp_year', 'value' => '7'],
            ['key' => 'about_image', 'value' => '20230212183501_about.jpg'],
            ['key' => 'slider_title_ar', 'value' => 'إنه لشرف لنا أن نجعل الفيلم مبدعًا'],
            ['key' => 'slider_title_en', 'value' => "it's our honour to make film creative"],
            ['key' => 'slider1', 'value' => '20230213130701_header.jpg'],
            ['key' => 'slider2', 'value' => '20230213130702_header.jpg'],
            ['key' => 'slider3', 'value' => '20230213130703_header.jpg'],
            ['key' => 'feature_section1_title_ar', 'value' => 'من نحن'],
            ['key' => 'feature_section1_title_en', 'value' => 'Who We Are'],
            ['key' => 'feature_section2_title_ar', 'value' => 'مجموعتنا'],
            ['key' => 'feature_section2_title_en', 'value' => 'Our Group'],
            ['key' => 'feature_section3_title_ar', 'value' => 'نهج رائد'],
            ['key' => 'feature_section3_title_en', 'value' => 'Pioneering Approach'],
            ['key' => 'website_name_ar', 'value' => 'نبراس فيلم'],
            ['key' => 'website_name_en', 'value' => 'Nebras Film'],
            ['key' => 'contact_number', 'value' => '123458896895'],
            ['key' => 'copyright', 'value' => '<p><strong>Copyright </strong>&amp; 2023 <a href="https://badee.com.sa/" target="_blank"><strong><em><u>Badee </u></em></strong></a>Website By Nebras Films</p>'],

        ];
        GeneralSetting::insert($settings);
    }
}

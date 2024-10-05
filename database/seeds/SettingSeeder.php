<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    public function run()
    {
        $user = Setting::create([
            'name' => 'sanad',
            'title_ar' => 'admin@admin.com',
            'title_en' => 'admin@admin.com',
            'mail' => 'sanad@sanad.com',
            'phone' => '000000000',
            'desc_ar' => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه',
            'desc_ar' => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه',
        ]);
    }
}

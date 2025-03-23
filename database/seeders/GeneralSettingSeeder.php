<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;


class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::create([
            'site_title' => 'raadodev.com',
            'site_email' => 'sethsopheara@gmail.com',
            'site_phone' => '060820377',
            'site_meta_keywords' => 'website_template, front-end, back-end, fullstack, laravel',
            'site_meta_description' => 'This site is under my development (Seth Sopheara) and if you there is any problem or questions please feel free to contact me!',
            'site_logo' => '',
            'site_favicon' => 'favicon_67dd78a947d75.png',
        ]);
    }
}

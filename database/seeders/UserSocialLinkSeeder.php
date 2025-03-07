<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserSocialLink;

class UserSocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSocialLink::create([
            'user_id' => User::first()->id,
            'facebook_url' => 'https://www.facebook.com/seth.sopheara/',
            'instagram_url' => 'https://www.instagram.com/sopheara_seth15/',
            'linkedin_url' => 'https://www.linkedin.com/in/seth-sopheara-ms2-900abb2a7/',
            'github_url' => 'https://github.com/SophearaGit',
        ]);
    }
}

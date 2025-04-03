<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Suppor\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\UserType;
use App\UserStatus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Seth Sopheara',
            'email' => 'sethsopheara@gmail.com',
            'username' => 'sopheara',
            'bio' => 'I am a passionate web developer specializing in Laravel, with expertise in both front-end and back-end development.',
            'password' => Hash::make('12345678'),
            'type' => UserType::SUPER_ADMIN,
            'status' => UserStatus::ACTIVE,
            'picture' => 'IMG_67ee38ec5635a.png',
        ]);
    }
}


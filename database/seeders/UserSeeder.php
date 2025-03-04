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
            'name' => 'Admin',
            'email' => 'sethsopheara@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'type' => UserType::SUPER_ADMIN,
            'status' => UserStatus::ACTIVE,
        ]);
    }
}


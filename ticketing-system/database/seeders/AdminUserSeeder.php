<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@rmw.com',
            'password' => bcrypt('R3m0t3WorkMa1aYs!A'),
            'uuid' => Str::uuid(),
            'is_admin' => true,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Liong Sooook Yik',
            'email' => 'liongsy020601@gmail.com',
            'password' => bcrypt('qweqweqwe'),
            'uuid' => Str::uuid(),
            'is_admin' => false,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Simon Chock',
            'email' => 'user@wanderworks.my',
            'password' => bcrypt(value: 'qweqweqwe'),
            'uuid' => Str::uuid(),
            'is_admin' => false,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}

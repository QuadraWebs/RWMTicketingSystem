<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Liong Sooook Yik',
            'email' => 'liongsy020601@gmail.com',
            'password' => Hash::make('qweqweqwe'),
            'uuid' => Str::uuid(),
            'phone' => '0123456789',
            'is_admin' => false,
        ]);

        // Create regular users
        User::create([
            'name' => 'Simon Chock',
            'email' => 'user@wanderworks.my',
            'password' => Hash::make('qweqweqwe'),
            'uuid' => Str::uuid(),
            'phone' => '01234567892',
            'is_admin' => false,
        ]);
    }
}

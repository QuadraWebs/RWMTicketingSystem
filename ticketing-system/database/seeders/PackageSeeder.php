<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'stripe_package_id' => 'price_H1X2Y3Z4',
                'name' => 'One Pass',
                'description' => "- Up to 4 hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 20.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'Coworking pass'
            ],
            [
                'stripe_package_id' => 'price_A7B8C9D0',
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 80.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 2,
                'title' => 'Coworking pass'
            ],
            [
                'stripe_package_id' => 'price_E5F6G7H8',
                'name' => 'Unlimited',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 300.00,
                'duration' => 240,
                'is_recurring' => 1,
                'pass_type' => 3,
                'title' => 'Coworking pass'
            ],
            [
                'stripe_package_id' => 'price_J1K2L3M4',
                'name' => 'One Pass',
                'description' => "- Up to 4 hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- RM25 spending credits\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 35.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'All-in pass'
            ],
            [
                'stripe_package_id' => 'price_N5P6Q7R8',
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- RM25 spending credits\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 155.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 2,
                'title' => 'All-in pass'
            ]
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

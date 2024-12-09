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
                'stripe_package_id' => env('COWORKING_ONEPASS_ID'),
                'name' => 'One Pass',
                'description' => "- Up to 4 hours per WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events\n\n- Valid for 1 month after purchase",
                'price' => 20.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'Coworking pass',
                'payment_link' => env('COWORKING_ONEPASS_LINK')
            ],
            [
                'stripe_package_id' => env('COWORKING_PACK5_ID'),
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events\n\n- Valid for 1 month after purchase",
                'price' => 80.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 5,
                'title' => 'Coworking pass',
                'payment_link' => env('COWORKING_PACK5_LINK')
            ],
            [
                'stripe_package_id' => env('COWORKING_UNLIMITED_ID'),
                'name' => 'Unlimited',
                'description' => "- Up to 4-hours WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events\n\n- Valid for 1 month after purchase",
                'price' => 300.00,
                'duration' => 240,
                'is_recurring' => 1,
                'pass_type' => 0,
                'title' => 'Coworking pass',
                'payment_link' => env('COWORKING_UNLIMITED_LINK')
            ],
            [
                'stripe_package_id' => env('ALLIN_ONEPASS_ID'),
                'name' => 'One Pass',
                'description' => "- Up to 4 hours WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- RM25 spending credits\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events\n\n- Valid for 1 month after purchase",
                'price' => 35.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'All-in pass',
                'payment_link' => env('ALLIN_ONEPASS_LINK')
            ],
            [
                'stripe_package_id' => env('ALLIN_PACK5_ID'),
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- RM25 spending credits\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events\n\n- Valid for 1 month after purchase",
                'price' => 155.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 5,
                'title' => 'All-in pass',
                'payment_link' => env('ALLIN_PACK5_LINK')
            ],
            [
                'stripe_package_id' => env('ALLIN_UNLIMITED_ID'),
                'name' => 'Unlimited',
                'description' => "- Up to 4-hours WorkSpace\n\n- Wifi, plug point, drinking water\n\n- DeviceCover ™\n\n- RM25 spending credits\n\n- Redeemable at any partner WorkSpaces\n\n- Privileged rates on community events",
                'price' => 800.00,
                'duration' => 240,
                'is_recurring' => 1,
                'pass_type' => 0,
                'title' => 'All-in pass',
                'payment_link' => env('ALLIN_UNLIMITED_LINK')
            ]
        ];



        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

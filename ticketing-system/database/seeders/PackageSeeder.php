<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $stripeEnv = env('APP_ENV') === 'local' ? 'test' : 'live';

        $packages = [
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQVwE077G7rJ' : 'prod_RGq0oV8wgnw5nA',
                'name' => 'One Pass',
                'description' => "- Up to 4 hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 20.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'Coworking pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/8wM6p714M2JN4PS002' : 'https://buy.stripe.com/test_6oEg0xcuT8t27QYcMS'
            ],
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQUIGNE4tLjt' : 'prod_RGq1mdh7LCE7BR',
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 80.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 2,
                'title' => 'Coworking pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/bIYcNv4gYfwz5TWdQT' : 'https://buy.stripe.com/test_cN26pXamL4cM3AIcMT'
            ],
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQVM3WU7U4KS' : 'prod_RHuMllmo5rxe1F',
                'name' => 'Unlimited',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 300.00,
                'duration' => 240,
                'is_recurring' => 1,
                'pass_type' => 3,
                'title' => 'Coworking pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/4gweVD6p6esv6Y08wA' : 'https://buy.stripe.com/test_00g4hP9iH6kUb3a5kp'
            ],
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQV3gULOBWdB' : 'prod_RHuPo4avHH1iq5',
                'name' => 'One Pass',
                'description' => "- Up to 4 hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- RM25 spending credits\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 35.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 1,
                'title' => 'All-in pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/fZebJr8xe8471DG5kp' : 'https://buy.stripe.com/test_7sIdSpeD1fVub3a7sw'
            ],
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQbtmdugJoBO' : 'prod_RHuQ9E8B11ecMf',
                'name' => 'Pack of 5',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- RM25 spending credits\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 155.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 2,
                'title' => 'All-in pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/dR600J14Mbgj2HKaEK' : 'https://buy.stripe.com/test_00g5lTcuTgZy3AI28b'
            ],
            [
                'stripe_package_id' => $stripeEnv === 'live' ? 'prod_RIPQrbCkuLN0zu' : 'prod_RHuQd8j6oIZuCe',
                'name' => 'Unlimited',
                'description' => "- Up to 4-hours use\n\n- Wifi, plug point, drinking water\n\n- DeviceCover\n\n- RM25 spending credits\n\n- Redeemable at any partner cafes\n\n- Privileged rates on community events",
                'price' => 800.00,
                'duration' => 240,
                'is_recurring' => 0,
                'pass_type' => 0,
                'title' => 'All-in pass',
                'payment_link' => $stripeEnv === 'live' ? 'https://buy.stripe.com/cN214NaFmbgj6Y0cMT' : 'https://buy.stripe.com/test_bIY7u152raBa8V228a'
            ]
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'stripe_package_id' => 'prod_RHuQd8j6oIZuCe',
                'name' => 'All-in pass ( Unlimited )',
                'description' => 'All-in pass ( Unlimited )',
                'price' => 800.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 0
            ],
            [
                'stripe_package_id' => 'prod_RHuQ9E8B11ecMf',
                'name' => 'All-in pass ( Pack of 5 )',
                'description' => 'All-in pass ( Pack of 5 )',
                'price' => 155.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 5
            ],
            [
                'stripe_package_id' => 'prod_RHuPo4avHH1iq5',
                'name' => 'All-in pass ( One Pass )',
                'description' => 'All-in pass ( One Pass )',
                'price' => 35.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 1
            ],
            [
                'stripe_package_id' => 'prod_RHuMllmo5rxe1F',
                'name' => 'Coworking pass ( Unlimited )',
                'description' => 'Coworking pass ( Unlimited )',
                'price' => 300.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 0
            ],
            [
                'stripe_package_id' => 'prod_RGq1mdh7LCE7BR',
                'name' => 'Coworking pass ( Pack of 5 )',
                'description' => 'Coworking pass ( Pack of 5 )',
                'price' => 80.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 5
            ],
            [
                'stripe_package_id' => 'prod_RGq0oV8wgnw5nA',
                'name' => 'Coworking pass ( One pass )',
                'description' => 'Coworking pass ( One pass )',
                'price' => 20.00,
                'duration' => 240,
                'is_recurring' => false,
                'pass_type' => 1
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
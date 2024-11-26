@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Subscriber Infomation</h1>
            <a href="{{ route('admin.subscribers') }}"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90">
                Back to Subscribers
            </a>
        </div>

        <!-- User Profile Section -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-4 rounded-lg">
                <div>
                    <p class="text-sm text-gray-600">Name</p>
                    <p class="font-medium">John Doe</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium">john.doe@example.com</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Phone</p>
                    <p class="font-medium">+60 12-345 6789</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Member Since</p>
                    <p class="font-medium">15 Jan 2024</p>
                </div>
            </div>
        </div>

        <!-- Active Tickets Section -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Active Tickets</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Package</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Available Passes
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valid Until</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">Premium Monthly</td>
                            <td class="px-6 py-4">15</td>
                            <td class="px-6 py-4">15 Feb 2024</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Unlimited Pass</td>
                            <td class="px-6 py-4">Unlimited</td>
                            <td class="px-6 py-4">28 Feb 2024</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    In Use
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
            <div class="space-y-4">
                @php
                    $dummyActivities = [
                        [
                            'cafe' => 'Coffee Bean KLCC',
                            'date' => '20 Jan 2024, 09:30 AM',
                            'status' => 'checked_in'
                        ],
                        [
                            'cafe' => 'Starbucks Pavilion',
                            'date' => '18 Jan 2024, 02:15 PM',
                            'status' => 'checked_out'
                        ],
                        [
                            'cafe' => 'San Francisco Coffee Mid Valley',
                            'date' => '15 Jan 2024, 10:45 AM',
                            'status' => 'checked_in'
                        ],
                        [
                            'cafe' => 'Coffee Bean Sunway Pyramid',
                            'date' => '12 Jan 2024, 11:20 AM',
                            'status' => 'checked_out'
                        ],
                        [
                            'cafe' => 'Starbucks Nu Sentral',
                            'date' => '10 Jan 2024, 03:40 PM',
                            'status' => 'checked_in'
                        ]
                    ];
                @endphp

                @foreach($dummyActivities as $activity)
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <span class="p-2 bg-blue-100 rounded-full">
                                    <i class="fas fa-coffee text-blue-600"></i>
                                </span>
                            </div>
                            <div>
                                <p class="font-medium">{{ $activity['cafe'] }}</p>
                                <p class="text-sm text-gray-600">{{ $activity['date'] }}</p>
                            </div>
                        </div>
                        <span
                            class="px-3 py-1 text-sm font-medium rounded-full 
                            {{ $activity['status'] === 'checked_in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst(str_replace('_', ' ', $activity['status'])) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
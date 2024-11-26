@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in">
        <!-- Welcome Section -->
        <div class="mb-8 flex justify-between items-center animate-slide-up">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">{{ Auth::user()->name }}</span></h1>
                <p class="text-gray-600 mt-2">Your gateway to productive workspaces and vibrant cafe communities! ☕✨</p>
            </div>
            <div class="flex space-x-4">
                <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg hover:opacity-90">
                    + New Packege
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-600">Active Tickets</h2>
                    <span class="p-2 bg-blue-50 rounded-lg">
                        <i class="fas fa-ticket-alt text-blue-600"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-900">5</div>
                <div class="mt-2 flex items-center text-sm">
                    <span class="text-green-500">↑ 12%</span>
                    <span class="text-gray-600 ml-2">from last month</span>
                </div>
            </div>
            <!-- Tickets Used Stats -->
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-600">Tickets Used</h2>
                    <span class="p-2 bg-orange-50 rounded-lg">
                        <i class="fas fa-ticket-alt text-orange-600"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-900">243</div>
                <div class="mt-2 flex items-center text-sm">
                    <span class="text-green-500">↑ 10%</span>
                    <span class="text-gray-600 ml-2">from last month</span>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-600">Total Users</h2>
                    <span class="p-2 bg-purple-50 rounded-lg">
                        <i class="fas fa-users text-purple-600"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ \App\Models\User::count() }}</div>
                <div class="mt-2 flex items-center text-sm">
                    <span class="text-green-500">↑ 8%</span>
                    <span class="text-gray-600 ml-2">from last month</span>
                </div>
            </div>
            <!-- Package Bought Stats -->
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.4s">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-gray-600">Packages Bought</h2>
                    <span class="p-2 bg-green-50 rounded-lg">
                        <i class="fas fa-box text-green-600"></i>
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-900">128</div>
                <div class="mt-2 flex items-center text-sm">
                    <span class="text-green-500">↑ 15%</span>
                    <span class="text-gray-600 ml-2">from last month</span>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.5s">
                <h3 class="text-lg font-semibold mb-4">Ticket Usage Analytics</h3>
                <div class="h-80" id="ticketUsageChart"></div>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.6s">
                <h3 class="text-lg font-semibold mb-4">Popular Visit Times</h3>
                <div class="h-80" id="visitTimesChart"></div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm animate-slide-up" style="animation-delay: 0.7s">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold">Recent Activity</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach(range(1, 5) as $index)
                    <div class="flex items-center justify-between hover:bg-gray-50 p-4 rounded-lg transition">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-coffee text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Cafe Visit - Coffee House {{ $index }}</h4>
                                <p class="text-sm text-gray-600">{{ $index }} hours ago</p>
                            </div>
                        </div>
                        <span class="px-4 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            Completed
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>@endsection

@push('scripts')
    <script>
        // Initialize charts when document is ready
        document.addEventListener('DOMContentLoaded', function () {
            // Ticket Usage Chart
            const ticketUsageChart = new ApexCharts(document.querySelector("#ticketUsageChart"), {
                chart: {
                    type: 'area',
                    height: 320,
                    toolbar: { show: false }
                },
                series: [{
                    name: 'Tickets Used',
                    data: [30, 40, 45, 50, 49, 60, 70]
                }],
                xaxis: {
                    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                colors: ['#4F46E5'],
                stroke: { curve: 'smooth' }
            });

            // Visit Times Chart
            const visitTimesChart = new ApexCharts(document.querySelector("#visitTimesChart"), {
                chart: {
                    type: 'bar',
                    height: 320,
                    toolbar: { show: false }
                },
                series: [{
                    name: 'Visits',
                    data: [25, 35, 45, 55, 45, 35, 25]
                }],
                xaxis: {
                    categories: ['9AM', '11AM', '1PM', '3PM', '5PM', '7PM', '9PM']
                },
                colors: ['#8B5CF6']
            });

            ticketUsageChart.render();
            visitTimesChart.render();
        });
    </script>
@endpush

    </script><script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('scripts')

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    .animate-slide-up {
        animation: slideUp 0.6s ease-out forwards;
    }

    /* Activity items animation */
    .space-y-4>div {
        opacity: 0;
        animation: slideUp 0.4s ease-out forwards;
    }

    .space-y-4>div:nth-child(1) {
        animation-delay: 0.8s;
    }

    .space-y-4>div:nth-child(2) {
        animation-delay: 0.9s;
    }

    .space-y-4>div:nth-child(3) {
        animation-delay: 1.0s;
    }

    .space-y-4>div:nth-child(4) {
        animation-delay: 1.1s;
    }

    .space-y-4>div:nth-child(5) {
        animation-delay: 1.2s;
    }
</style>
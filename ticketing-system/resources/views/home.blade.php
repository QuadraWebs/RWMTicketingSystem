@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}</h1>
                <p class="text-gray-600 mt-2">Here's what's happening with your tickets today.</p>
            </div>
            <div class="flex space-x-4">
                <button class="bg-white border border-gray-200 px-4 py-2 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-bell"></i>
                </button>
                <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg hover:opacity-90">
                    + New Ticket
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
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
            <!-- Similar cards for other stats -->
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-semibold mb-4">Ticket Usage Analytics</h3>
                <div class="h-80" id="ticketUsageChart"></div>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-semibold mb-4">Popular Visit Times</h3>
                <div class="h-80" id="visitTimesChart"></div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
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
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Dummy data for charts
    document.addEventListener('DOMContentLoaded', function() {
        const ticketUsageOptions = {
            chart: {
                type: 'area',
                height: 320,
                toolbar: { show: false }
            },
            series: [{
                name: 'Ticket Usage',
                data: [30, 40, 35, 50, 49, 60, 70]
            }],
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            },
            colors: ['#4F46E5']
        };

        const visitTimesOptions = {
            chart: {
                type: 'bar',
                height: 320,
                toolbar: { show: false }
            },
            series: [{
                name: 'Visits',
                data: [44, 55, 57, 56, 61, 58, 63]
            }],
            colors: ['#8B5CF6']
        };

        new ApexCharts(document.querySelector("#ticketUsageChart"), ticketUsageOptions).render();
        new ApexCharts(document.querySelector("#visitTimesChart"), visitTimesOptions).render();
    });
</script>
@endpush
@endsection

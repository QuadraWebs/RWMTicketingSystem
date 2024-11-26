@extends('layouts.app')

@section('content')
<style>
    /* Animation Keyframes */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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

    /* Base Styles */
    .dashboard {
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .container {
        max-width: 90rem;
        margin: 0 auto;
    }

    /* Welcome Section */
    .welcome-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        animation: fadeIn 0.5s ease-out;
    }

    .welcome-text {
        font-size: 1.875rem;
        font-weight: bold;
        color: #111827;
    }

    .welcome-name {
        background: linear-gradient(90deg, #2563eb, #9333ea);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .welcome-subtitle {
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .new-package-btn {
        background: linear-gradient(90deg, #2563eb, #9333ea);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        border: none;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .new-package-btn:hover {
        opacity: 0.9;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        animation: slideUp 0.6s ease-out forwards;
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stat-title {
        font-size: 0.875rem;
        font-weight: 600;
        color: #4b5563;
    }

    .stat-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-value {
        font-size: 1.875rem;
        font-weight: bold;
        color: #111827;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        font-size: 0.875rem;
    }

    .trend-up {
        color: #059669;
    }

    .trend-text {
        color: #6b7280;
    }

    /* Charts Section */
    .charts-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .chart-card {
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        animation: slideUp 0.6s ease-out forwards;
    }

    .chart-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 1rem;
    }

    .chart-container {
        height: 20rem;
    }

    /* Recent Activity */
    .activity-card {
        background: white;
        border-radius: 0.75rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        animation: slideUp 0.6s ease-out forwards;
    }

    .activity-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .activity-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
    }

    .activity-list {
        padding: 1.5rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        border-radius: 0.5rem;
        transition: background-color 0.2s;
        animation: slideUp 0.4s ease-out forwards;
    }

    .activity-item:hover {
        background: #f9fafb;
    }

    .activity-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .activity-icon {
        background: #eff6ff;
        padding: 0.75rem;
        border-radius: 9999px;
        color: #2563eb;
    }

    .activity-details h4 {
        font-weight: 600;
        color: #111827;
    }

    .activity-details p {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .activity-status {
        background: #ecfdf5;
        color: #065f46;
        padding: 0.25rem 1rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    @media (min-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }

        .charts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<div class="dashboard">
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div>
                <h1 class="welcome-text">Welcome back, <span class="welcome-name">{{ Auth::user()->name }}</span></h1>
                <p class="welcome-subtitle">Your gateway to productive workspaces and vibrant cafe communities! ☕✨</p>
            </div>
            <button class="new-package-btn">+ New Package</button>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Active Tickets</span>
                    <span class="stat-icon" style="background: #eff6ff;">
                        <i class="fas fa-ticket-alt" style="color: #2563eb;"></i>
                    </span>
                </div>
                <div class="stat-value">5</div>
                <div class="stat-trend">
                    <span class="trend-up">↑ 12%</span>
                    <span class="trend-text">from last month</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Tickets Used</span>
                    <span class="stat-icon" style="background: #fff7ed;">
                        <i class="fas fa-ticket-alt" style="color: #ea580c;"></i>
                    </span>
                </div>
                <div class="stat-value">243</div>
                <div class="stat-trend">
                    <span class="trend-up">↑ 10%</span>
                    <span class="trend-text">from last month</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Total Users</span>
                    <span class="stat-icon" style="background: #f5f3ff;">
                        <i class="fas fa-users" style="color: #7c3aed;"></i>
                    </span>
                </div>
                <div class="stat-value">{{ \App\Models\User::count() }}</div>
                <div class="stat-trend">
                    <span class="trend-up">↑ 8%</span>
                    <span class="trend-text">from last month</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Packages Bought</span>
                    <span class="stat-icon" style="background: #ecfdf5;">
                        <i class="fas fa-box" style="color: #059669;"></i>
                    </span>
                </div>
                <div class="stat-value">128</div>
                <div class="stat-trend">
                    <span class="trend-up">↑ 15%</span>
                    <span class="trend-text">from last month</span>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="charts-grid">
            <div class="chart-card">
                <h3 class="chart-title">Ticket Usage Analytics</h3>
                <div class="chart-container" id="ticketUsageChart"></div>
            </div>
            <div class="chart-card">
                <h3 class="chart-title">Popular Visit Times</h3>
                <div class="chart-container" id="visitTimesChart"></div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="activity-card">
            <div class="activity-header">
                <h3 class="activity-title">Recent Activity</h3>
            </div>
            <div class="activity-list">
                @foreach(range(1, 5) as $index)
                <div class="activity-item">
                    <div class="activity-info">
                        <span class="activity-icon">
                            <i class="fas fa-coffee"></i>
                        </span>
                        <div class="activity-details">
                            <h4>Cafe Visit - Coffee House {{ $index }}</h4>
                            <p>{{ $index }} hours ago</p>
                        </div>
                    </div>
                    <span class="activity-status">Completed</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
@endsection

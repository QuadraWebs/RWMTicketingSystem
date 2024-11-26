@extends('layouts.app')

@section('content')
<style>
    /* Animation Keyframes */
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

    /* Base Styles */
    .container {
        max-width: 90rem;
        margin: 0 auto;
        padding: 1.5rem 1rem;
        animation: fadeIn 0.5s ease-out;
    }

    .content-card {
        background: white;
        border-radius: 0.75rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        animation: slideUp 0.6s ease-out;
    }

    /* Header */
    .header-page {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #111827;
    }

    .back-button {
        background: linear-gradient(90deg, #2563eb, #9333ea);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: opacity 0.2s;
    }

    .back-button:hover {
        opacity: 0.9;
    }

    /* Section Styles */
    .section {
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 1rem;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
        background: #f9fafb;
        padding: 1rem;
        border-radius: 0.5rem;
    }

    @media (min-width: 768px) {
        .profile-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .profile-item label {
        display: block;
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .profile-item span {
        font-weight: 500;
        color: #111827;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table th {
        background: #f9fafb;
        padding: 0.75rem 1.5rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 500;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 1px solid #e5e7eb;
    }

    .table td {
        padding: 1rem 1.5rem;
        font-size: 0.875rem;
        color: #111827;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Status Badge */
    .status-badge {
        display: inline-flex;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-in-use {
        background: #dbeafe;
        color: #1e40af;
    }

    /* Activity List */
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: #f9fafb;
        border-radius: 0.5rem;
        transition: background-color 0.2s;
    }

    .activity-item:hover {
        background: #f3f4f6;
    }

    .activity-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .activity-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        background: #dbeafe;
        border-radius: 9999px;
        color: #2563eb;
    }

    .activity-details h4 {
        font-weight: 500;
        color: #111827;
        margin-bottom: 0.25rem;
    }

    .activity-details p {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .activity-status {
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-checked-in {
        color: #059669;
    }

    .status-checked-out {
        color: #dc2626;
    }
</style>

<div class="container">
    <div class="content-card">
        <!-- Header -->
        <div class="header-page">
            <h1 class="header-title">Subscriber Details</h1>
            <a href="{{ route('admin.subscribers') }}" class="back-button">
                Back to Subscribers
            </a>
        </div>

        <!-- Profile Information -->
        <div class="section">
            <h2 class="section-title">Profile Information</h2>
            <div class="profile-grid">
                <div class="profile-item">
                    <label>Name</label>
                    <span>John Doe</span>
                </div>
                <div class="profile-item">
                    <label>Email</label>
                    <span>john.doe@example.com</span>
                </div>
                <div class="profile-item">
                    <label>Phone</label>
                    <span>+60 12-345 6789</span>
                </div>
                <div class="profile-item">
                    <label>Joined Date</label>
                    <span>Jan 15, 2024</span>
                </div>
            </div>
        </div>

        <!-- Active Tickets -->
        <div class="section">
            <h2 class="section-title">Active Tickets</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Status</th>
                        <th>Valid Until</th>
                        <th>Available Passes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Premium Monthly Pass</td>
                        <td>
                            <span class="status-badge status-in-use">In Use</span>
                        </td>
                        <td>Feb 15, 2024</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Day Pass Bundle</td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>Mar 01, 2024</td>
                        <td>5 passes</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Recent Activity -->
        <div class="section">
            <h2 class="section-title">Recent Activity</h2>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-info">
                        <div class="activity-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Coffee House Downtown</h4>
                            <p>Jan 20, 2024 09:30 AM</p>
                        </div>
                    </div>
                    <span class="activity-status status-checked-in">Check-in</span>
                </div>

                <div class="activity-item">
                    <div class="activity-info">
                        <div class="activity-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Coffee House Downtown</h4>
                            <p>Jan 20, 2024 11:30 AM</p>
                        </div>
                    </div>
                    <span class="activity-status status-checked-out">Check-out</span>
                </div>

                <div class="activity-item">
                    <div class="activity-info">
                        <div class="activity-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div class="activity-details">
                            <h4>Workspace Hub Central</h4>
                            <p>Jan 19, 2024 02:00 PM</p>
                        </div>
                    </div>
                    <span class="activity-status status-checked-in">Check-in</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.75rem;
    }

    .action-button {
        color: #6b7280;
        transition: color 0.2s;
        cursor: pointer;
        font-size: 1rem;
    }

    .view-button {
        color: #059669;
    }

    .edit-button {
        color: #2563eb;
    }

    .delete-button {
        color: #dc2626;
        border: none;
    }

    .view-button:hover {
        color: #047857;
    }

    .edit-button:hover {
        color: #1d4ed8;
    }

    .delete-button:hover {
        color: #b91c1c;
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
                    <span>{{ $subscriber->name }}</span>
                </div>
                <div class="profile-item">
                    <label>Email</label>
                    <span>{{ $subscriber->email }}</span>
                </div>
                <div class="profile-item">
                    <label>Phone</label>
                    <span>{{ $subscriber->phone ?? 'Not provided' }}</span>
                </div>
                <div class="profile-item">
                    <label>Joined Date</label>
                    <span>{{ $subscriber->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Active Tickets -->
        <div class="section">
            <h2 class="section-title">Tickets</h2>
            @if($tickets->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Valid Until</th>
                            <th>Available Passes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.subscribers.edit_user_ticket', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}" 
                                            class="action-button edit-button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="showDeleteTicketModal('{{ route('admin.subscribers.destroy_user_ticket', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}')"
                                            class="action-button delete-button">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>{{ $ticket->package->title }}</td>
                                <td>
                                    <span class="status-badge {{ $ticket->status == 'active' ? 'status-active' : 'status-in-use' }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td>{{ $ticket->valid_until->format('M d, Y') }}</td>
                                <td>{{ $ticket->remaining_passes ?? 'Unlimited' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div style="text-align: center; padding: 2rem; background: #f9fafb; border-radius: 0.5rem;">
                    <i class="fas fa-ticket-alt" style="font-size: 2rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                    <p style="color: #6b7280; font-size: 0.875rem;">No tickets found for this subscriber</p>
                </div>
            @endif
        </div>


        <!-- Recent Activity -->
        <div class="section">
            <h2 class="section-title">Recent Activity</h2>
            <div class="activity-list">
                @if($activities->count() > 0)
                    @foreach($activities as $activity)
                        <div class="activity-item">
                            <div class="activity-info">
                                <div class="activity-icon">
                                    @if($activity->status == 'accepted')
                                        <i class="fas fa-check-circle" style="color: #059669;"></i>
                                    @elseif($activity->status == 'rejected')
                                        <i class="fas fa-times-circle" style="color: #dc2626;"></i>
                                    @else
                                        <i class="fas fa-clock" style="color: #111827;"></i>
                                    @endif
                                </div>
                                <div class="activity-details">
                                    <h4>{{ $activity->cafe->name }}</h4>
                                    <p>{{ $activity->created_at->format('M d, Y h:i A') }}</p>
                                </div>
                            </div>
                            <span class="activity-status" style="color: 
                                @if($activity->status == 'Accepted') #059669 
                                @elseif($activity->status == 'Rejected') #dc2626
                                @else #111827 
                                @endif">
                                {{ $activity->status }}
                            </span>
                        </div>
                    @endforeach
                @else
                    <div style="text-align: center; padding: 2rem; background: #f9fafb; border-radius: 0.5rem;">
                        <i class="fas fa-history" style="font-size: 2rem; color: #9ca3af; margin-bottom: 1rem;"></i>
                        <p style="color: #6b7280; font-size: 0.875rem;">No recent activities found</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
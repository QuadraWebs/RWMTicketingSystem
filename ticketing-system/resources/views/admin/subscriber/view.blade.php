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

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .modal-content {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        max-width: 500px;
        width: 90%;
    }

    .modal-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        justify-content: flex-end;
    }

    .cancel-button {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        background: #f3f4f6;
        border: none;
        cursor: pointer;
    }

    .confirm-button {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        background: #172A91;
        color: white;
        text-decoration: none;
        border: none;
        cursor: pointer;
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
        background: #172A91;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: opacity 0.2s;
    }

    .back-button:hover {
        background: #131f69;
        transform: translateY(-1px);
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
        gap: 0.5rem;
        align-items: center;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
        min-width: 60px;
    }

    .action-button:nth-child(1) {
        background: rgba(37, 99, 235, 0.1);
        color: #2563eb;
    }

    .edit-button {
        background: rgba(37, 99, 235, 0.1);
        color: #2563eb;
        padding: 8px;
        border-radius: 10px;
        text-decoration: none;
    }

    .action-button:nth-child(2) {
        background: rgba(220, 38, 38, 0.1);
        color: #dc2626;
    }

    .action-button:nth-child(3) {
        background: rgba(23, 42, 145, 0.1);
        color: #172A91;
    }

    .action-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
            width: 100%;
        }

        .action-button {
            width: 100%;
            justify-content: center;
        }
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
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2 class="section-title">Profile Information</h2>
                <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" class="edit-button">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Valid Until</th>
                            <th>Available Passes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    <!-- In the action buttons div -->
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.subscribers.edit_user_ticket', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}"
                                            class="action-button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="showDeleteTicketModal('{{ route('admin.subscribers.destroy_user_ticket', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}')"
                                            class="action-button">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <a href="#"
                                            onclick="event.preventDefault(); showResendEmailModal('{{ route('admin.subscribers.resend-welcome', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}', '{{ $subscriber->name }}','{{ $ticket->package->title }}-{{$ticket->package->name}}')"
                                            class="action-button">
                                            <i class="fas fa-envelope"></i>
                                        </a>

                                    </div>

                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.25rem;">
                                        <span style="font-weight: 500;">{{ $ticket->package->title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.25rem;">
                                        <span style="font-weight: 500;">{{ $ticket->package->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="status-badge {{ $ticket->status == 'active' ? 'status-active' : 'status-in-use' }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td>{{ $ticket->valid_until->format('M d, Y') }}</td>
                                <td>{{ $ticket->available_pass ?? 'Unlimited' }}</td>
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
<div id="resendEmailModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Confirm Email Resend</h2>
        <p>Are you sure you want to resend this welcome email with this package (<span id="packageName"></span>) to
            <span id="userName"></span>?
        </p>
        <div class="modal-buttons">
            <button onclick="closeResendEmailModal()" class="cancel-button">Cancel</button>
            <a href="#" id="confirmResend" class="confirm-button"
                onclick="event.preventDefault(); handleResendConfirm(this);">
                Resend
            </a>
        </div>
    </div>
</div>
<script>
    function showDeleteTicketModal(deleteUrl) {
        if (confirm('Are you sure you want to delete this ticket?')) {
            // Create and submit a form to handle the DELETE request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;

            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // Add method spoofing for DELETE
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        }
    }

    function showResendEmailModal(route, name, packagename) {
        document.getElementById('resendEmailModal').style.display = 'flex';
        document.getElementById('userName').textContent = name;
        document.getElementById('packageName').textContent = packagename;
        document.getElementById('confirmResend').href = route;
    }

    function closeResendEmailModal() {
        document.getElementById('resendEmailModal').style.display = 'none';
    }

    function handleResendConfirm(button) {
        button.textContent = 'Sending...';
        button.style.opacity = '0.7';
        button.style.cursor = 'not-allowed';
        button.disabled = true;
        window.location.href = button.href;
    }
</script>


@endsection
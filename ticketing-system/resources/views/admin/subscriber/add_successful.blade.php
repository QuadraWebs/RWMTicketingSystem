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
        background: #172A91;
        -webkit-background-clip: text;
        background-clip: text;
        color: #172A91;
    }

    .success-message {
        text-align: center;
        padding: 2rem;
    }

    .success-icon {
        font-size: 4rem;
        color: #10B981;
        margin-bottom: 1rem;
    }

    .success-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #10B981;
        margin-bottom: 1rem;
    }

    .success-text {
        color: #6B7280;
        margin-bottom: 2rem;
    }

    .button-group {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .button {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .button-primary {
        background: #172A91;
        color: white;
        border: none;
    }

    .button-primary:hover {
        background: #131f69;
        transform: translateY(-1px);
    }
</style>

<div class="container">
    <div class="content-card">
        <div class="header-page">
            <h1 class="header-title">Subscriber Added Successfully</h1>
        </div>

        <div class="success-message">
            <i class="fas fa-check-circle success-icon"></i>
            <h2 class="success-title">New Subscriber Created!</h2>
            <p class="success-text">The subscriber has been successfully added to the system.</p>

            <div class="button-group">
                <a href="{{ route('admin.subscribers.create') }}" class="button button-primary">Add Another
                    Subscriber</a>
                <a href="{{ route('admin.subscribers') }}" class="button button-primary">View All Subscribers</a>
            </div>
        </div>
    </div>
</div>
@endsection

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
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
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
        color: transparent;
    }

    .error-message {
        text-align: center;
        padding: 2rem;
    }

    .error-icon {
        font-size: 4rem;
        color: #EF4444;
        margin-bottom: 1rem;
    }

    .error-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #EF4444;
        margin-bottom: 1rem;
    }

    .error-text {
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
            <h1 class="header-title">Failed to Add Package</h1>
        </div>

        <div class="error-message">
            <i class="fas fa-times-circle error-icon"></i>
            <h2 class="error-title">Operation Failed</h2>
            <p class="error-text">There was an error while adding the new package. Please try again.</p>
            
            <div class="button-group">
                <a href="{{ route('admin.package.add') }}" class="button button-primary">Try Again</a>
                <a href="{{ route('admin.package') }}" class="button button-primary">Back to Packages</a>
            </div>
        </div>
    </div>
</div>
@endsection
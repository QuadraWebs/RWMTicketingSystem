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

    .header {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #2563eb, #9333ea);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* Form Styles */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .form-field {
        margin-bottom: 1.5rem;
    }

    .form-field.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s;
        background: #f9fafb;
    }

    .form-input:hover {
        border-color: #9ca3af;
    }

    .form-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        background: white;
    }

    .form-textarea {
        min-height: 8rem;
        resize: vertical;
        line-height: 1.5;
    }

    .duration-summary {
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.5rem;
        padding: 0.5rem;
        background: #f3f4f6;
        border-radius: 0.375rem;
        transition: all 0.2s;
    }

    /* Button Group */
    .button-group {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
    }

    .button {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .button-cancel {
        border: 1px solid #d1d5db;
        background: white;
        color: #374151;
    }

    .button-cancel:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }

    .button-submit {
        background: linear-gradient(90deg, #2563eb, #9333ea);
        color: white;
        border: none;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.1);
    }

    .button-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
    }

    .button-submit:active {
        transform: translateY(0);
    }

    /* Input Validation Styles */
    .form-input:invalid {
        border-color: #ef4444;
    }

    .form-input:invalid:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    /* Number Input Styles */
    input[type="number"] {
        -moz-appearance: textfield;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="container">
    <div class="content-card">
        <div class="header">
            <h1 class="header-title">Add New Package</h1>
        </div>

        <form action="{{ route('admin.package.store') }}" method="POST">
            @csrf
            
            <div class="form-grid">
                <div class="form-field">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input" required>
                </div>

                <div class="form-field">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" required>
                </div>

                <div class="form-field full-width">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input form-textarea" required></textarea>
                </div>

                <div class="form-field">
                    <label class="form-label">Price (RM)</label>
                    <input type="number" step="0.01" name="price" class="form-input" required>
                </div>

                <div class="form-field">
                    <label class="form-label">Duration (minutes)</label>
                    <input type="number" 
                        name="duration" 
                        id="duration"
                        class="form-input"
                        required
                        onkeypress="return (event.charCode !== 46 && event.charCode >= 48 && event.charCode <= 57)"
                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); updateDurationSummary(this.value)"
                        step="1"
                        min="1"
                        pattern="\d*">
                    <p id="durationSummary" class="duration-summary"></p>
                </div>

                <div class="form-field">
                    <label class="form-label">Pass Type</label>
                    <input type="text" name="pass_type" class="form-input" required>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('admin.package') }}" class="button button-cancel">Cancel</a>
                <button type="submit" class="button button-submit">Create Package</button>
            </div>
        </form>
    </div>
</div>

<script>
function updateDurationSummary(minutes) {
    const days = Math.floor(minutes / (24 * 60));
    const hours = Math.floor((minutes % (24 * 60)) / 60);
    const remainingMinutes = minutes % 60;
    let summary = '';
    
    if (days > 0) {
        summary += `${days} day${days > 1 ? 's' : ''}`;
    }
    
    if (hours > 0) {
        if (days > 0) summary += ' ';
        summary += `${hours} hr${hours > 1 ? 's' : ''}`;
    }
    
    if (remainingMinutes > 0) {
        if (hours > 0 || days > 0) summary += ' ';
        summary += `${remainingMinutes} min${remainingMinutes > 1 ? 's' : ''}`;
    }
    
    document.getElementById('durationSummary').textContent = summary;
}
</script>
@endsection

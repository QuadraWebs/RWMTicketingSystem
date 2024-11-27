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

    .container {
        max-width: 90rem;
        margin: 0 auto;
        padding: 1.5rem 1rem;
        animation: fadeIn 0.5s ease-out;
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
        color: transparent;
    }

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

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.625rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }

    .form-textarea {
        min-height: 100px;
        resize: vertical;
    }

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
        background: #172A91;
        color: white;
        border: none;
        box-shadow: 0 2px 4px rgba(37, 99, 235, 0.1);
    }

    .button-submit:hover {
        background: #131f69;
        transform: translateY(-1px);
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

    .datalist-wrapper {
        position: relative;
        width: 100%;
    }

    .datalist-input {
        padding-right: 2.5rem !important;
    }

    .datalist-icon {
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-size: 0.75rem;
        pointer-events: none;
        transition: transform 0.2s ease;
    }

    .datalist-input:focus + .datalist-icon {
        transform: translateY(-50%) rotate(180deg);
        color: #172A91;
    }

    /* Style for datalist options (visible in supported browsers) */
    input::-webkit-calendar-picker-indicator {
        opacity: 0;
        width: 2.5rem;
        height: 100%;
        position: absolute;
        right: 0;
        cursor: pointer;
    }
</style>

<div class="container">
    <div class="content-card">
        <div class="header-page">
            <h1 class="header-title">Edit Package</h1>
            <a href="{{ route(name: 'admin.package') }}" class="back-button">
                Back to My Packages
            </a>
        </div>

        <form action="{{ route('admin.package.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="form-grid">
                <div class="form-field">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $package->title }}" class="form-input" required>
                    <datalist id="title-list">
                        @foreach($titles as $title)
                            <option value="{{ $title->title }}">
                        @endforeach
                    </datalist>
                </div>
                
                <div class="form-field">
                    <label class="form-label">Stripe Package ID</label>
                    <input type="text" name="stripe_package_id" value="{{ $package->stripe_package_id }}" class="form-input" required>
                </div>
        
                <div class="form-field">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $package->name }}" class="form-input" required>
                </div>
        
                <div class="form-field">
                    <label class="form-label">Pass Type (No. of Entry)</label>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <input type="number" name="pass_type" id="pass_type" value="{{ $package->pass_type }}" class="form-input"
                            min="1" required>
                        <label class="checkbox-label" style="display: flex; align-items: center;">
                            <input type="checkbox" id="unlimited_pass" class="checkbox" style="margin-right: 0.5rem;">
                            Unlimited
                        </label>
                    </div>
                </div>

                <div class="form-field">
                    <label class="form-label">Price (RM)</label>
                    <input type="number" name="price" value="{{ $package->price }}" step="0.01" class="form-input" required>
                </div>
        
                <div class="form-field">
                    <label class="form-label">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" value="{{ $package->duration }}" class="form-input" min="1"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>                        required>
                    <p id="durationSummary" class="duration-summary"></p>
                </div>
        
                <div class="form-field full-width">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input form-textarea"
                        required>{{ $package->description }}</textarea>
                </div>
                
                <div class="form-field full-width">
                    <label class="form-label">Payment Link</label>
                    <input type="text" name="payment_link" class="form-input" required>
                </div>
            </div>
        
            <div class="button-group">
                <button type="submit" class="button button-submit">Update Package</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passTypeInput = document.getElementById('pass_type');
        const unlimitedCheckbox = document.getElementById('unlimited_pass');
        const durationInput = document.getElementById('duration');

        unlimitedCheckbox.addEventListener('change', function () {
            if (this.checked) {
                passTypeInput.value = 0;
                passTypeInput.disabled = true;
            } else {
                passTypeInput.disabled = false;
                passTypeInput.value = 1;
            }
        });

        passTypeInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        durationInput.addEventListener('input', function () {
            updateDurationSummary(parseInt(this.value));
        });

        function updateDurationSummary(minutes) {
            if (!minutes) {
                document.getElementById('durationSummary').textContent = '0 min';
                return;
            }

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
        updateDurationSummary(document.getElementById('duration').value);

        document.querySelector('.datalist-input').addEventListener('focus', function () {
            this.value = '';
        });

        document.querySelector('.datalist-input').addEventListener('input', function () {
            const value = this.value.toLowerCase();
            const options = document.querySelectorAll('#title-list option');

            options.forEach(option => {
                const optionValue = option.getAttribute('data-valu//e').toLowerCase();
                if (optionValue.includes(value)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
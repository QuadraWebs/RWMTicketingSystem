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

    /* Form Styles */
    .form-section {
        margin-bottom: 2rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .form-field {
        margin-bottom: 1rem;
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

    .form-select {
        width: 100%;
        padding: 0.625rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        background-color: white;
    }

    .submit-button {
        background: linear-gradient(90deg, #2563eb, #9333ea);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 0.5rem;
        font-weight: 500;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .submit-button:hover {
        opacity: 0.9;
    }
</style>

<div class="container">
    <div class="content-card">
        <!-- Header -->
        <div class="header-page">
            <div>
                <h1 class="header-title">Edit Ticket - {{ $subscriber->name }}</h1>
            </div>
            <a href="{{ route('subscriber.view', $subscriber->uuid) }}" class="back-button">
                Back to Subscriber
            </a>
        </div>

        <!-- Edit Form -->
        <form id="updateTicketForm"
            action="{{ route('admin.subscribers.update_user_ticket', ['uuid' => $subscriber->uuid, 'ticket' => $ticket->id]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-field">
                    <label class="form-label">Package</label>
                    <select name="package_id" class="form-select" disabled>
                        @foreach($packages->sortBy('title') as $package)
                            <option value="{{ $package->id }}" {{ $ticket->package_id == $package->id ? 'selected' : '' }}>
                                {{ $package->title }} - {{ $package->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-field">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="active" {{ $ticket->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $ticket->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-field">
                    <label class="form-label">Valid Until</label>
                    <input type="date" name="valid_until" class="form-input"
                        value="{{ $ticket->valid_until->format('Y-m-d') }}" required>
                </div>

                <div class="form-field">
                    <label class="form-label">Available Pass</label>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <input type="number" name="available_pass" id="available_pass" class="form-input"
                            value="{{ $ticket->is_unlimited ? '0' : $ticket->available_pass }}" min="0" 
                            {{ $ticket->is_unlimited ? 'disabled' : '' }}>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <input type="checkbox" id="unlimited_passes" name="is_unlimited"
                                {{ $ticket->is_unlimited ? 'checked' : '' }}
                                style="cursor: pointer;">
                            <label for="unlimited_passes" style="cursor: pointer; font-size: 0.875rem; color: #374151;">
                                Unlimited
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: right; margin-top: 2rem;">
                <button type="submit" class="submit-button">Update Ticket</button>
            </div>
        </form>
    </div>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @elseif(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    showConfirmButton: true
                });
            });
        </script>
    @endif

</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("input[name='valid_until']", {
            dateFormat: "Y-m-d",
            defaultDate: "{{ $ticket->valid_until->format('Y-m-d') }}",
            minDate: "today",
            enableTime: false
        });


        const unlimitedCheckbox = document.getElementById('unlimited_passes');
        const availablePassInput = document.getElementById('available_pass');
        const form = document.getElementById('updateTicketForm');

        // Set initial state
        if (unlimitedCheckbox.checked) {
            availablePassInput.disabled = true;
            availablePassInput.value = '0';
        }

        unlimitedCheckbox.addEventListener('change', function () {
            availablePassInput.disabled = this.checked;
            if (this.checked) {
                availablePassInput.value = '0';
                availablePassInput.setAttribute('disabled', 'disabled');
            } else {
                availablePassInput.value = '{{ $ticket->available_pass }}';
                availablePassInput.removeAttribute('disabled');
                availablePassInput.focus();
            }
        });
        

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: data.status,
                        title: data.status === 'success' ? 'Success!' : 'Error!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
        });

    });



</script>
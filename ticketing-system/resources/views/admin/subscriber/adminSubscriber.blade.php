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

    /* Header Section */
    .header-page {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .header-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #111827;
    }

    .header-subtitle {
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }

    .add-button {
        background: #172A91;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: opacity 0.2s;
    }

    .add-button:hover {
        background: #131f69;
        transform: translateY(-1px);
    }

    .add-button:hover {
        opacity: 0.9;
    }

    /* Search Section */
    .search-container {
        margin-bottom: 1.5rem;
    }

    .search-form {
        display: flex;
        gap: 0.5rem;
    }

    .search-input-wrapper {
        position: relative;
        flex: 1;
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }

    .search-input {
        width: 100%;
        padding: 0.625rem 2.5rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem 0 0 0.5rem;
        font-size: 0.875rem;
    }

    .search-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }

    .clear-search {
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        cursor: pointer;
    }

    .search-button {
        background: #172A91;
        color: white;
        padding: 0.625rem 1.5rem;
        border: none;
        border-radius: 0 0.5rem 0.5rem 0;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .search-button:hover {
        background: #131f69;
        transform: translateY(-1px);
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
    }
    
    .table-container::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }

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

    .table tr:hover td {
        background: #f9fafb;
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

    /* Copy Link Button */
    .copy-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border: 1px solid #2563eb;
        color: #2563eb;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .copy-button:hover {
        background: #eff6ff;
    }

    .copy-button svg {
        width: 1rem;
        height: 1rem;
    }

    /* Delete Modal */
    .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 50;
    }

    .modal {
        background: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        max-width: 24rem;
        width: 90%;
    }

    .modal-title {
        font-size: 1.125rem;
        font-weight: bold;
        color: #111827;
        margin-bottom: 1rem;
    }

    .modal-text {
        color: #6b7280;
        margin-bottom: 1.5rem;
    }

    .modal-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .modal-button {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        cursor: pointer;
    }

    .cancel-button {
        background: white;
        border: 1px solid #e5e7eb;
        color: #6b7280;
    }

    .cancel-button:hover {
        background: #f9fafb;
    }

    .delete-confirm-button {
        background: #dc2626;
        color: white;
        border: none;
    }

    .delete-confirm-button:hover {
        background: #b91c1c;
    }

    /* Pagination */
    .pagination {
        margin-top: 1.5rem;
    }

    /* Animation Delays for Table Rows */
    .table tr {
        opacity: 0;
        animation: slideUp 0.4s ease-out forwards;
    }

    .table tr:nth-child(1) { animation-delay: 0.1s; }
    .table tr:nth-child(2) { animation-delay: 0.2s; }
    .table tr:nth-child(3) { animation-delay: 0.3s; }
    .table tr:nth-child(4) { animation-delay: 0.4s; }
    .table tr:nth-child(5) { animation-delay: 0.5s; }
    .table tr:nth-child(6) { animation-delay: 0.6s; }
    .table tr:nth-child(7) { animation-delay: 0.7s; }
    .table tr:nth-child(8) { animation-delay: 0.8s; }
    .table tr:nth-child(9) { animation-delay: 0.9s; }
    .table tr:nth-child(10) { animation-delay: 1s; }
</style>

<div class="container">
    <div class="content-card">
        <!-- Header -->
        <div class="header-page">
            <div>
                <h1 class="header-title">Subscribers</h1>
                <p class="header-subtitle">Total Subscribers: {{ $subscribers->total() }}</p>
            </div>
            <a href="{{ route('admin.subscribers.create') }}" class="add-button">
                Add New Subscriber
            </a>
        </div>

        <!-- Search -->
        <div class="search-container">
            <form action="{{ route('admin.subscribers') }}" method="GET" class="search-form">
                <div class="search-input-wrapper">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search subscribers by name or email..."
                        class="search-input">
                    @if(request('search'))
                        <a href="{{ route('admin.subscribers') }}" class="clear-search">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </div>
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subscription Date</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers->sortByDesc('is_admin') as $subscriber)
                        <tr data-subscriber-id="{{ $subscriber->id }}">
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('subscriber.view', $subscriber->uuid) }}" class="action-button view-button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if(!$subscriber->is_admin)
                                        <button
                                            onclick="showDeleteModal('{{ route('admin.subscribers.destroy', $subscriber->id) }}', '{{ $subscriber->id }}')"
                                            class="action-button delete-button">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                            <td>
                                @if(!$subscriber->is_admin)
                                    <button onclick="copyToClipboard(this, '{{ url('/viewticket/' . $subscriber->uuid) }}')"
                                        class="copy-button">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                        </svg>
                                        Copy Link
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $subscribers->links() }}
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal-backdrop">
    <div class="modal">
        <h3 class="modal-title">Confirm Deletion</h3>
        <p class="modal-text">Are you sure you want to delete this subscriber? This action cannot be undone.</p>
        <div class="modal-buttons">
            <button onclick="closeDeleteModal()" class="modal-button cancel-button">Cancel</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="modal-button delete-confirm-button">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    let isAnimating = false;

    function copyToClipboard(button, text) {
        if (isAnimating) return;

        isAnimating = true;

        // Use the newer Clipboard API with fallback
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(() => {
                updateButtonUI(button);
            }).catch(() => {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    updateButtonUI(button);
                } catch (err) {
                    console.error('Failed to copy text:', err);
                }
                document.body.removeChild(textArea);
            });
        } else {
            // Fallback for non-secure contexts
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                updateButtonUI(button);
            } catch (err) {
                console.error('Failed to copy text:', err);
            }
            document.body.removeChild(textArea);
        }
    }

    function updateButtonUI(button) {
        const originalText = button.innerHTML;
        button.style.opacity = '0';

        setTimeout(() => {
            button.innerHTML = `
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        Copied
    `;
            button.style.opacity = '1';

            setTimeout(() => {
                button.style.opacity = '0';
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.opacity = '1';
                    isAnimating = false;
                }, 150);
            }, 2700);
        }, 150);
    }

    function showDeleteModal(deleteUrl, subscriberId) {
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'flex';

        document.getElementById('deleteForm').onsubmit = function (e) {
            e.preventDefault();

            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Hide modal immediately
                    modal.style.display = 'none';

                    // Remove the subscriber row
                    const subscriberRow = document.querySelector(`tr[data-subscriber-id="${subscriberId}"]`);
                    if (subscriberRow) {
                        subscriberRow.remove();
                    }

                    // Update total count
                    const totalElement = document.querySelector('.header-subtitle');
                    const currentTotal = parseInt(totalElement.textContent.match(/\d+/)[0]);
                    totalElement.textContent = `Total Subscribers: ${currentTotal - 1}`;

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Subscriber deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
        };
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 animate-fade-in">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 animate-slide-up">
        <!-- Header -->
         <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Subscribers</h1>
                <p class="text-sm text-gray-600 mt-1">Total Subscribers: {{ $subscribers->total() }}</p>
            </div>
            <a href="{{ route('admin.subscribers.create') }}"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90">
                Add New Subscriber
            </a>
        </div>

        <div class="relative mb-6">
            <form action="{{ route('admin.subscribers') }}" method="GET" class="flex">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search subscribers by name or email..."
                        class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    @if(request('search'))
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <a href="{{ route('admin.subscribers') }}" class="text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
                <button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 rounded-r-lg hover:opacity-90 transition-opacity duration-150">
                    Search
                </button>
            </form>
        </div>

        <div class="overflow-x-auto hide-scrollbar">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subscription Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($subscribers->sortByDesc('is_admin') as $subscriber)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('subscriber.view', $subscriber->uuid) }}" class="text-green-600 hover:text-green-900 mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" 
                                class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if(!$subscriber->is_admin)
                                    <button onclick="showDeleteModal('{{ route('admin.subscribers.destroy', $subscriber->id) }}')"
                                        class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $subscriber->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $subscriber->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $subscriber->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    @if(!$subscriber->is_admin)
                                        <button onclick="copyToClipboard(this, '{{ url('/viewticket/' . $subscriber->uuid) }}')"
                                            class="inline-flex items-center px-3 py-1.5 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                            </svg>
                                            Copy Link
                                        </button>
                                    @endif
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $subscribers->links() }}
        </div>
    </div>
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Confirm Deletion</h3>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this subscriber? This action cannot be undone.</p>
            <div class="flex justify-end gap-4">
                <button onclick="closeDeleteModal()"
                    class="w-24 h-10 px-4 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-24 h-10 px-4 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
let isAnimating = false;

    function copyToClipboard(button, text) {
        if (isAnimating) return;
        
        isAnimating = true;
        navigator.clipboard.writeText(text);
        const originalText = button.innerHTML;
        
        button.classList.add('transition-all', 'duration-150', 'ease-in-out');
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
    function showDeleteModal(deleteUrl) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
        document.getElementById('deleteForm').action = deleteUrl;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
</script>

<style>
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

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    .animate-slide-up {
        animation: slideUp 0.6s ease-out;
    }

    tbody tr {
        opacity: 0;
        animation: slideUp 0.4s ease-out forwards;
    }

    tbody tr:nth-child(1) {
        animation-delay: 0.1s;
    }

    tbody tr:nth-child(2) {
        animation-delay: 0.2s;
    }

    tbody tr:nth-child(3) {
        animation-delay: 0.3s;
    }

    tbody tr:nth-child(4) {
        animation-delay: 0.4s;
    }

    tbody tr:nth-child(5) {
        animation-delay: 0.5s;
    }

    tbody tr:nth-child(6) {
        animation-delay: 0.6s;
    }

    tbody tr:nth-child(7) {
        animation-delay: 0.7s;
    }

    tbody tr:nth-child(8) {
        animation-delay: 0.8s;
    }

    tbody tr:nth-child(9) {
        animation-delay: 0.9s;
    }

    tbody tr:nth-child(10) {
        animation-delay: 1s;
    }
    .hide-scrollbar {
        overflow: hidden;
    }

    @keyframes showScrollbar {
        to {
            overflow: auto;
        }
    }

    .overflow-x-auto {
        animation: showScrollbar 0s 1s forwards;
    }
</style>
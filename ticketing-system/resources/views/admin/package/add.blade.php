@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Add New Package</h1>
        </div>

        <form action="{{ route('admin.package.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price (RM)</label>
                    <input type="number" step="0.01" name="price" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                    <input type="number" name="duration" id="duration"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required oninput="updateDurationSummary(this.value)">
                    <p id="durationSummary" class="mt-1 text-sm text-gray-500"></p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                    <input type="number" 
                        name="duration" 
                        id="duration"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                        required
                        onkeypress="return (event.charCode !== 46 && event.charCode >= 48 && event.charCode <= 57)"
                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); updateDurationSummary(this.value)"
                        step="1"
                        min="1"
                        pattern="\d*">
                    <p id="durationSummary" class="mt-1 text-sm text-gray-500"></p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Pass Type</label>
                    <input type="text" name="pass_type" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.package') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:opacity-90">
                    Create Package
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

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
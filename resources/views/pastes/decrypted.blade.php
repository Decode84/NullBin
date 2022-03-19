<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @if (session('decrypt'))
            <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300"
                role="alert">
                <span class="font-medium">ok: </span>{{ session()->get('decrypt') }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>

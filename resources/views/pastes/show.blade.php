<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <form action="{{ route('paste.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="px-4 py-5 sm:px-6">
                        <div class="grid grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Author</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->author }}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Paste Title</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Language</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->language }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Expiration</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->expiration->diffForHumans() }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                        <label class="block text-sm font-medium text-gray-700">Your paste</label>
                        <div class="mt-1">
                            <textarea readonly="read" rows="15" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ $paste->content }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

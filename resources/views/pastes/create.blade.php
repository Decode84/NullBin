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
                                <input type="text" name="author" placeholder="anon"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Paste Title</label>
                                <input type="text" name="title" placeholder="bS65cRAuKN"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Language</label>
                                <select name="language"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($languages as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Expiration</label>
                                <select id="location" name="expire"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="5">5 Minutes</option>
                                    <option value="10">10 Minutes</option>
                                    <option value="30">30 Minutes</option>
                                    <option value="60">1 Hour</option>
                                    <option value="1d">1 Day</option>
                                    <option value="1w">1 Week</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                        <label class="block text-sm font-medium text-gray-700">Your paste</label>
                        <div class="mt-1">
                            <textarea rows="15" name="content" required="required" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <div class="py-2">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="flex items-center">
                                <input type="text" name="password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="py-4">
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create encrypted paste
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

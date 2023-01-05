<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12">
            @if (session('key_displayed'))
                <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300"
                    role="alert">
                    <span class="font-medium">This is your decryption key: </span>{{ session('key') }}
                </div>
            @endif
            <form action="{{ route('paste.decrypt', $paste->url) }}" method="POST">
                @csrf
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="grid grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Author</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->author }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Paste Title</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->title }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Language</label>
                                <input readonly="read" type="text" placeholder="{{ $paste->language }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Expiration</label>
                                <input readonly="read" type="text" placeholder=""
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                        <label class="block text-sm font-medium text-gray-700">Your paste</label>
                        <div class="mt-1">
                            @if (session()->has('decrypt'))
                                <textarea name="content" readonly="read" rows="15"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{!! session('decrypt') !!}</textarea>
                            @else
                                <textarea name="content" readonly="read" rows="15"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{!! $paste->content !!}</textarea>
                            @endif
                        </div>
                        @if ($paste->is_encrypted)
                            <div class="py-2">
                                <label for="key" class="block text-sm font-medium text-gray-700">Key</label>
                                <div class="flex items-center">
                                    <input name="key" type="password"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="py-4">
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Decrypt paste
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
            <div class="pt-10">
                @foreach ($comments as $comment)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="px-4 py-5 sm:px-6">

                            <div class="flex items-center">
                                <img class="w-12 h-12 rounded-md shadow-md border-2 border-blue-500"
                                src="{{ auth()->user()->avatar_path }}" alt=""> 
                                <div class="flex flex-col ml-4">
                                    <p class="text-lg">{{ $comment->user->username }}</p>
                                    <p class="text-xs text-neutral-600">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:p-6">
                            <p class="text-base  text-neutral-800">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pt-5">
                <form action="#" method="POST">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <form action="{{ route('paste.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="px-4 py-5 sm:px-6">
                        <div class="grid grid-cols-5 gap-4">
                            <div>
                                <x-label for="Author" :value="__('Author')" />
                                <x-input id="author" class="block mt-1 w-full" type="text" name="author"
                                    placeholder="Anon (Optional)" value="{{ old('author') }}" required autofocus />
                            </div>

                            <div>
                                <x-label for="Paste Title" :value="__('Paste Title')" />
                                <x-input type="text" id="title" name="title" placeholder="rand32 (Optional)"
                                    value="{{ old('title') }}" />
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
                                <label for="location" class="block text-sm font-medium text-gray-700">Paste
                                    visibility</label>
                                <select id="location" name="visibility"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="public">Public</option>
                                    <option value="unlisted">Unlisted</option>
                                    @can('createPrivate', App\Paste::class)
                                        <option value="private">Private</option>
                                    @endcan
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

                            <div>
                                <label>
                                    <input type="checkbox" name="encrypt" value="1"> Encrypt
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                        <x-label for="content" :value="__('Content')" />
                        <x-textarea name="content" id="content" rows="15"></x-textarea>
                        <div class="pt-4">
                            <x-button>
                                {{ __('Create encrypted paste') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

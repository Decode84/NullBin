<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <img class="w-16 h-16 rounded-md shadow-md border-2 border-blue-500"
                                src="{{ auth()->user()->avatar_path }}" alt="">
                            <div class="flex-col">
                                <p class="ml-4 text-gray-900 text-lg font-semibold">{{ $user->username }}</p>
                                <span class="ml-4 text-sm text-gray-500">{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="flex items-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-10">
                <div class="flex flex-row items-center space-x-4">
                    <div class="w-full">
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <div class="mb-4">
                                    <h1>Pastes created</h1>
                                </div>
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                Title
                                                            </th>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                language
                                                            </th>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                expiration
                                                            </th>
                                                            <th scope="col"
                                                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                                created
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pastes as $item)
                                                            <tr class="bg-white border-b">
                                                                <td
                                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                                    {{ $item->title }}
                                                                </td>
                                                                <td
                                                                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                                    {{ $item->language }}
                                                                </td>
                                                                <td
                                                                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                                    {{ $item->expiration->diffForHumans() }}
                                                                </td>
                                                                <td
                                                                    class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                                    {{ $item->created_at->diffForHumans() }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="pt-18">
        <div class="max-w-7xl mx-auto py-12">
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
                                                        <th scope="col"
                                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                            Author
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pastes as $paste)
                                                    <tr class="bg-white border-b">
                                                        <td
                                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                            <a href="{{ route('paste.show', $paste->url) }}">{{ $paste->title }}</a>
                                                        </td>
                                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $paste->language }}
                                                        </td>
                                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $paste->expiration->diffForHumans() }}
                                                        </td>
                                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ $paste->created_at->diffForHumans() }}
                                                        </td>
                                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                            <a href="{{ route('profile.show', $paste->user->username )}}">{{ $paste->user->username }}</a>
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
</x-app-layout>

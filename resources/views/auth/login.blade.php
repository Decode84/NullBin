<x-guest-layout>
    <div class="container mx-auto max-w-lg">
        <div class="py-24 px-8">
            <div class="bg-white rounded px-8 py-5 shadow-md border border-gray-200">
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    @csrf
                    <div class="flex flex-col">
                        <h1 class="text-xl mb-5">Login</h1>

                        <label class="text-gray-800 text-sm mb-2" for="">Username</label>
                        <input name="username" type="text"
                            class="rounded border border-gray-200 text-gray-800 bg-gray-50 focus:outline-none px-2 py-1">


                        <label class="text-gray-800 text-sm mb-2 pt-5" for="">Password</label>
                        <input type="password" name="password"
                            class="rounded border border-gray-200 text-gray-800 bg-gray-50 focus:outline-none px-2 py-1">

                        <div class="pt-4 flex">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 flex items-center text-white text-sm px-10 py-2 rounded-md focus:outline-none">Authenticate</button>
                        </div>
                        <a href="{{ route('auth.register') }}" class="text-indigo-500 text-sm pt-4">Don't have an
                            account yet?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

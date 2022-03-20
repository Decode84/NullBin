<x-guest-layout>
    <div class="container mx-auto max-w-lg">
        <div class="py-24 px-8">
            <div class="bg-white rounded px-8 py-5 shadow-md border border-gray-200">
                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="flex flex-col">
                        <h1 class="text-xl mb-4">Account registration</h1>

                        <label type="text" class="text-gray-800 text-sm mb-2" for="">Username</label>
                        <input name="username" type="text"
                            class="rounded border border-gray-200 text-gray-800 bg-gray-50 focus:outline-none px-2 py-1">

                        <label class="text-gray-800 text-sm mb-2 pt-5" for="">Password</label>
                        <input name="password" type="password"
                            class="rounded border border-gray-200 text-gray-800 bg-gray-50 focus:outline-none px-2 py-1">

                        <label class="text-gray-800 text-sm mb-2 pt-5" for="">Confirm password</label>
                        <input name="password_confirmation" type="password"
                            class="rounded border border-gray-200 text-gray-800 bg-gray-50 focus:outline-none px-2 py-1">

                        <div class="pt-4 flex">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 flex items-center text-white text-sm px-10 py-2 rounded-md focus:outline-none">Create account</button>
                        </div>
                        <a href="{{ route('auth.login') }}" class="text-indigo-500 text-sm pt-4">Already have an account?</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>

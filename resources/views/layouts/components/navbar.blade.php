<nav class="palette-bg-black shadow-sm">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden sm:-my-px  sm:flex sm:space-x-8">
                    <a href="{{ route('paste.create') }}"
                        class="text-gray-200 inline-flex items-center px-1 pt-1 text-sm font-medium"
                        aria-current="page">Paste</a>
                    <a href="{{ route('page.about') }}"
                        class="text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 text-sm font-medium">About</a>
                </div>
            </div>
            <div class="flex">
                <div class="sm:-my-px sm:flex sm:space-x-8">
                    @guest
                    <a href="{{ route('auth.login') }}"
                        class="text-gray-200 inline-flex items-center px-1 pt-1 text-sm font-medium">Login</a>
                    <a href="{{ route('auth.register') }}"
                        class="text-gray-200 inline-flex items-center px-1 pt-1 text-sm font-medium">Register</a>
                    @endguest
                    @auth
                    <p class="text-gray-200 inline-flex items-center px-1 pt-1 text-sm font-medium">Logged in as: <span
                            class="text-sky-600 ml-2"><a href="{{ route('profile.show', Auth::user()) }}">{{ Auth::user()->username }}</a></span></p>
                    <a href="{{ route('auth.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                        class="text-gray-200 inline-flex items-center px-1 pt-1 text-sm font-medium">Logout</a>
                    <form id="frm-logout" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

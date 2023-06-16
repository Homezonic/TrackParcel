<header aria-label="Site Header" class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
                <a class="block text-teal-600" href="/">
                    <img src="{{ asset('storage/assets/logo.png') }}" alt="logo" width="164px" height="48px">
                </a>
            </div>

            <div class="hidden md:block">
                <nav aria-label="Site Nav">
                    <ul class="flex items-center gap-6 text-sm">
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('index') }}">Home</a></li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('about-us') }}">About Us</a></li>
                        <li><a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">
                    <a class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow" href="{{ route('track') }}">Track Package</a>
                </div>

                <div class="block md:hidden">
                    <button id="mobileMenuButton" class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobileMenu" class="md:hidden hidden bg-gray-100 p-4">
        <ul class="flex flex-col gap-4 text-sm">
            <li> <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('index') }}">Home</a></li>
            <li> <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('about-us') }}">About Us</a></li>
            <li> <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('contact-us') }}">Contact Us</a></li>
        </ul>
    </nav>
</header>
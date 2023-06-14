<footer aria-label="Site Footer" class="bg-gray-100">
    <div
        class="flex flex-col items-center gap-4 rounded-lg bg-indigo-600 p-6 shadow-lg sm:flex-row sm:justify-between">
        <strong class="text-xl text-white sm:text-xl">
            Your next shipment
        </strong>

        <a class="inline-flex items-center gap-2 rounded-full border border-white bg-white px-8 py-3 text-indigo-600 hover:bg-transparent hover:text-white focus:outline-none focus:ring active:bg-white/90"
            href="{{ route('contact-us') }}">
            <span class="text-sm font-medium"> Let's Get It Covered </span>

            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
    <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
        <div class="absolute top-4 right-4 sm:top-6 sm:right-6 lg:top-8 lg:right-8">
            <a id="backToTopBtn" class="fixed z-90 bottom-10 right-8 bg-indigo-600 w-16 h-16 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" href="#MainContent">
              <span class="sr-only">Back to top</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>


        <div class="lg:flex lg:items-end lg:justify-between">
            <div>
                <div class="flex justify-center text-teal-600 lg:justify-start">
                    <img src="{{ asset('storage/assets/logo.png') }}" alt="logo" width="164px" height="48px">
                </div>

                <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">
                    {{ __('tpl.aboutusheader') }}
                </p>
            </div>

            <nav aria-label="Footer Nav" class="mt-12 lg:mt-0">
                <ul class="flex flex-wrap justify-center gap-6 md:gap-8 lg:justify-end lg:gap-12">

                    <li>
                        <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ route('about-us') }}">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ route('contact-us') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
            Copyright &copy; {{ now()->year }}. All rights reserved.
        </p>
    </div>
</footer>
<x-layouts.main>
<section class="bg-gray-50 mt-10">
    <div class="bg-indigo-900 text-center py-4 lg:px-4">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
          <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Hello!</span>
          <span class="font-semibold mr-2 text-left flex-auto">Please enter your tracking number below.</span>
        </div>
      </div>
    @if (session()->has('error'))
    <div class="p-8 md:p-12 lg:px-10 lg:py-10">
        <div class="mx-auto mt-5 max-w-xl">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Err!</strong>
                <span class="block sm:inline"> {{ session('error') }}</span>
              </div>

        </div>
    </div>
    @endif
    <div class="p-8 md:p-12 lg:px-10 lg:py-10">
        <div class="mx-auto mt-5 max-w-xl">
            <form action="{{ route('search') }}" method="POST" class="sm:flex sm:gap-4">
                @csrf
                <div class="sm:flex-1 justify-between">
                    <label for="trackingnumber" class="sr-only">Tracking Number</label>
                    <input type="text" placeholder="ex TP3764262422" name="trackingNumber"
                        class="w-full rounded-md border-gray-200 bg-white p-3 text-gray-700 shadow-sm transition focus:border-white focus:outline-none focus:ring focus:ring-yellow-400" />
                </div>
                <button type="submit"
                    class="group mt-4 flex w-full items-center justify-center gap-2 rounded-md bg-rose-600 px-5 py-2 text-white transition focus:outline-none focus:ring focus:ring-yellow-400 sm:mt-0 sm:w-auto">
                    <span class="text-sm font-medium"> Track Now </span>

                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    </section>
</x-layouts.main>
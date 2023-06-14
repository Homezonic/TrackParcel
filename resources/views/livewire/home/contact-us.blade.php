<x-layouts.main>
    <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply" style="background-image: url('{{ asset('assets/img/bg_img.jpg') }}')">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-24">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"> {{ ucwords(str_replace('-', ' ', Route::currentRouteName())) }}            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{ __('tpl.contactusheader') }}</p>
        </div>
    </section>
    <section class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                   {{__('tpl.trusthead')}}
                </h2>

                <p class="mt-4 text-gray-500 sm:text-xl">
                    {{ __('tpl.trustheadbody') }}
                </p>
            </div>

            <div class="mt-8 sm:mt-12">
                @if (session()->has('success'))
                <div class="p-8 md:p-12 lg:px-10 lg:py-10">
                    <div class="mx-auto mt-5 max-w-xl">
                        <div class="mt-4 px-4 py-2 bg-green-100 text-green-800 rounded-md" role="alert">
                            <strong class="font-bold">Yay!</strong>
                            <span class="block sm:inline"> {{ session('success') }}</span>
                          </div>

                    </div>
                </div>
                @elseif (session()->has('error'))
                <div class="p-8 md:p-12 lg:px-10 lg:py-10">
                    <div class="mx-auto mt-5 max-w-xl">
                        <div class="mt-4 px-4 py-2 bg-red-100 text-white-800 rounded-md" role="alert">
                            <strong class="font-bold">Err!</strong>
                            <span class="block sm:inline"> {{ session('error') }}</span>
                          </div>

                    </div>
                </div>
                @endif
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                    </div>
                    <div class="mt-4">
                        <label for="phone" class="block text-lg font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                    </div>
                    <div class="mt-4">
                        <label for="message" class="block text-lg font-medium text-gray-700">Message</label>
                        <textarea name="formmessage" id="formmessage" rows="4" class="mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required></textarea>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="py-2 px-6 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>

</x-layouts.main>
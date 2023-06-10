<x-layouts.base>
    @auth()
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts.footers.auth.footer')
                    </div>
                </div>
            </main>
    @endauth
    @guest
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            <div class="mt-5">
                @include('layouts.footers.guest.with-socials')
            </div>
            @endif
    @endguest
</x-layouts.base>

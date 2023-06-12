<x-layouts.main-app>
    @if(in_array(request()->route()->getName(), ['index', 'track']))
        @include('layouts.navbars.main.head')
        @elseif (in_array(request()->route()->getName(), ['trackresult', 'search']))
        @include('layouts.navbars.main.head')
        <div class="pt-40 bg-gray-100"></div>
    @endif
        {{ $slot }}
    @if(in_array(request()->route()->getName(), ['index', 'track', 'trackresult', 'search']))
            @include('layouts.footers.main.footer')
    @endif
</x-layouts.main-app>

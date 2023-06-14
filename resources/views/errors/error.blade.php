<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metas -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Error {{ $statusCode }}</title>
    @if(env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif
    <link rel="icon" type="image/png" href="{{ asset('storage/assets/favicon.png') }}">
    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="pt-40 bg-gray-800 relative z-10 py-32">
        <div class="container mx-auto">
          <div class="-mx-4 flex">
            <div class="w-full px-4">
              <div class="pt-40 mx-auto max-w-2xl text-center">
                @if ($statusCode == "404")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                  The page you requested for could not be found.<br> Check the link and try again
                </h4>
                @elseif ($statusCode == "403")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                  Access Forbidden
                </h4>
                @elseif ($statusCode == "405")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                    Method Not Allowed
                </h4>
                @elseif ($statusCode == "408")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                    Request TimeOut
                </h4>
                @elseif ($statusCode == "500")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                    Internal Server Error
                </h4>
                @elseif ($statusCode == "503")
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                    Service Unavailable
                </h4>
                @else
                <h4 class="mb-2 text-4xl font-bold leading-none text-white sm:text-xlg md:text-xlg">
                    {{ $statusCode }}
                </h4>
                <h4 class="mb-3 text-3xl font-semibold leading-tight text-white">
                    Error Encountered, Contact Support
                </h4>
                @endif
                <p class="mb-8 text-lg text-white">
                 Naviage Back
                </p>
                <a href="{{ route('index') }}" class="hover:text-primary inline-block rounded-lg border border-white px-8 py-3 text-center text-base font-semibold text-white transition hover:bg-white">
                  Go To Home
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-40 mx-auto max-w-2xl text-center">
          <div class="h-full w-1/3 bg-gradient-info"></div>
        </div>
      </section>

</body>
</html>
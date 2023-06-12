<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metas -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $siteDescription }}">
    <meta name="keywords" content="{{ $siteKeywords }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $siteName }}</title>
    @if(env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif
    <link rel="icon" type="image/png" href="{{ Storage::url($siteFavicon) }}">
    <!-- styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
        {{ $slot }}
    <!--   Core JS Files   -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#searchForm').submit(function(event) {
        event.preventDefault();
        var trackingNumber = $('#trackingNumberInput').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/search',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: {
                trackingNumber: trackingNumber
            },
            beforeSend: function() {
                $('#trackButton').text('Searching...');
                $('#trackButton').attr('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    $('#trackingInfo').html(JSON.stringify(response.trackingInfo));
                } else {
                    $('#trackingInfo').html('Shipment not found');
                }
            },
            error: function(xhr) {
                $('#trackingInfo').html('Error occurred');
            },
            complete: function() {
                $('#trackButton').text('Track Shipment');
                $('#trackButton').attr('disabled', false);
                $('#trackingNumberInput').val('');
            }
        });
    });
});
    </script>
</body>
</html>
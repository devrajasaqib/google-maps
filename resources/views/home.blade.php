<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Save Locations</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href={{ asset('css/style.css') }} rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">        
        <div id="map"></div>
        <div class="toggle-button">
            <label class="checkbox-toggle for="enable-btn">
                <input type="checkbox" checked id="enable-btn" /> 
                <div class="checkbox__checkmark"></div>
                <span>Add Markers</span>
            </label>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&v=weekly&solution_channel=GMP_CCS_simpleclickevents_v2" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src={{ asset('js/map.js') }}></script>


    </body>
</html>

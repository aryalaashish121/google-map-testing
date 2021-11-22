<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Google Map</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100vh;
                margin: 2rem;
            }
        </style>
    </head>
    <body class="antialiased" >
        <div id="app">
            <div>
                Ambulance
                <div class="map">
                    <gmap-map
                    :center="{lat:27.7127183009111,lng: 85.32814707931915}"
                    :zoom = "7"
                    style="width: 100%; height: 680px;"
                    v-on:click="handleCreateNewResturant"
                    >
                    <gmap-info-window
                        :options = "infoWindowOptions"
                        :position = "infoWindowPosition()"
                        :opened = "infoWindowOpened"
                        @closeclick="handleInfoWindowClose"
                    >
                    <div class="info-window">
                        <h2 v-text="activeResturant.name"></h2>
                        <h5 v-text="activeResturant.hours"> </h5>
                        <h5 v-text="activeResturant.address"></h5>
                    </div>
                    </gmap-info-window>
                    <gmap-marker
                    v-for="(r,index) in resturants"
                    :key = "r.id"
                    :position = "getPosition(r)"
                    {{-- :position="{lat:27.7127183009111,lng:85.32814707931915}" --}}
                    :clickable="true"
                    :dragable="true"
                    v-on:click="handleMarkerClicked(r)"
                    
                    >
                </gmap-map>

                </div>
            </div>
           
        </div>
    </body>
   
</html>
<script src="{{ asset('js/app.js') }}" defer></script>
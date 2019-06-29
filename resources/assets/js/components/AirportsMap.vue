<template>
<div class="row mt-3">
    <div class="col-12">
        <div id="home-airports-map"></div>
    </div>
</div>
</template>

<script>
import AmCharts from 'amcharts3'
Vue.use(AmCharts);

export default {
    props: ['airports'],
    data() {
        return {
            msg: 'Welcome to Your Vue.js + amCharts App',
        }
    },
    created() {

        var rollOverColor = "#E71D36";
        var color = "#E71D36";
        var color2 = "#5BC0EB";
        var targetSVG =
            "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

        var images = this.airports.map(function(airport) {
            return {
                'svgPath': targetSVG,
                'zoomLevel': 64,
                'scale': 0.5,
                'title': airport.name + ', ' + airport.city,
                'latitude': airport.lat,
                'longitude': airport.lon,
                'icao': airport.icao
            }
        })

        window.AmCharts.makeChart("home-airports-map", {
            "type": "map",
            "dragMap": false,
            "projection": "miller",
            "zoomOnDoubleClick": false,
            "imagesSettings": {
                "rollOverColor": rollOverColor,
                "rollOverScale": 3,
                "selectedScale": 3,
                "selectedColor": "#FF9F1C",
                "color": color
            },
            "areasSettings": {
                "unlistedAreasColor": "#ffffff",
                "outlineThickness": 0,
                "unlistedAreasAlpha": 0,
                "unlistedAreasOutlineAlpha": 0,
                "selectedColor": "#E71D36",
                "color": color2,
                "balloonText": ""
            },
            "listeners": [{
                "event": "clickMapObject",
                "method": function(event) {
                    setTimeout(
                        function() {
                            window.location.href = '/airports/' + event.mapObject.icao;
                        }, 500);

                }
            }],
            "zoomControl": {
                "panControlEnabled": false,
                "zoomControlEnabled": false,
                "homeButtonEnabled": false,
            },
            "dataProvider": {
                "map": "worldHigh",
                "zoomLevel": 20,
                "zoomLongitude": 24.5000,
                "zoomLatitude": 38.1000,
                "areas": [{
                    "id": "GR"
                }, ],
                "images": images
            },
            "export": {
                "enabled": false
            },
        });

    }
}
</script>

<template>
<div class="row mt-2">
    <div class="col-12">

        <gmap-map ref="gmap" :center="center" :zoom="maps_zoom" style="width:100%;  height: 450px;" v-bind:options="mapStyles">
            <gmap-marker :key="index" v-for="(m, index) in markers" :position="m.position" :icon="m.icon"></gmap-marker>

            <gmap-polyline :path="windPolyline.path" :options="windPolyline.options" ref="windpolyline"></gmap-polyline>

        </gmap-map>

    </div>
</div>
</template>

<script>
let data = {
  google_maps_api_key: process.env.MIX_GOOGLE_MAPS_API_KEY,
}

import * as VueGoogleMaps from "vue2-google-maps";
import {
    gmapApi
} from 'vue2-google-maps'
import {
    loaded
} from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: data.google_maps_api_key,
        libraries: "geometry" // necessary for places input
    }
});

export default {
    name: "ActiveRunwayMap",
    props: ['airport_id', 'airport_lat', 'airport_lon', 'maps_zoom', 'arrival_runway_initial', 'departure_runway_initial', 'metar'],
    computed: {
        google: gmapApi
    },
    data() {
        return {
            mapStyles: {
                styles: [{
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": 33
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f2e5d4"
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#c5dac6"
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{
                        "lightness": 20
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#c5c6c6"
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e4d7c6"
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#fbfaf7"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#acbcc9"
                    }]
                }]
            },
            center: {
                lat: this.airport_lat,
                lng: this.airport_lon
            },
            arrival_runway: this.arrival_runway_initial,
            departure_runway: this.departure_runway_initial,
            wind_direction: this.metar.wind_direction,
            wind_calm: this.metar.wind_calm,
            wind_variable: this.metar.wind_variable,
            markers: {
                arrivalMarker: {},
                departureMarker: {},
                windMarker: {}
            },
            windPolyline: {}
        };
    },
    mounted() {

        loaded.then(() => {
            this.addMarkers()
        })

        Echo.channel('weather-tracker.' + this.airport_id)
            .listen('WeatherChanged', (airport) => {
                this.arrival_runway = airport.activeArrivals
                this.departure_runway = airport.activeDepartures
                this.wind_direction = airport.metar.wind_direction
                this.wind_calm = airport.metar.wind_calm
                this.wind_variable = airport.metar.wind_variable
                this.addMarkers();
            })
    },

    methods: {
        addMarkers() {

            var arrivalMarker = {
                lat: parseFloat(this.arrival_runway.arrival_lat),
                lng: parseFloat(this.arrival_runway.arrival_lon)
            };
            this.markers.arrivalMarker = {
                position: arrivalMarker,
                icon: {
                    rotation: parseInt(this.arrival_runway.heading) + 7,
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    scale: 6,
                    size: new google.maps.Size(20, 32),
                    strokeColor: '#4DBD74',
                    strokeOpacity: 0.3,
                    strokeWeight: 4,
                    fillColor: '#4DBD74',
                    fillOpacity: 1,
                }
            }

            var departureMarker = {
                lat: parseFloat(this.departure_runway.departure_lat),
                lng: parseFloat(this.departure_runway.departure_lon)
            };
            this.markers.departureMarker = {
                position: departureMarker,
                icon: {
                    rotation: parseInt(this.departure_runway.heading) + 7,
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    scale: 6,
                    size: new google.maps.Size(20, 32),
                    strokeColor: '#F86C6B',
                    strokeOpacity: 0.3,
                    strokeWeight: 4,
                    fillColor: '#F86C6B',
                    fillOpacity: 1,
                }
            }

            if (this.wind_direction != 0) {

                var windMarker = {
                    lat: parseFloat(this.airport_lat),
                    lng: parseFloat(this.airport_lon)
                }
                this.markers.windMarker = {
                    position: windMarker,
                    icon: {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        repeat: '20px',
                        scale: 8,
                        strokeColor: '#000',
                        strokeOpacity: 0.3,
                        strokeWeight: 3,
                        fillColor: '#F8CB01',
                        fillOpacity: 1,
                        rotation: parseInt(this.wind_direction) - 180,
                    }
                }

                var lineSymbol = {
                    path: 'M 0,-1 0,1',
                    strokeOpacity: 1,
                    strokeColor: '#F8CB01',
                    scale: 4
                };

                this.windPolyline = {
                    path: [{
                        lat: parseFloat(this.airport_lat),
                        lng: parseFloat(this.airport_lon)
                    }, {
                        lat: parseFloat(this.airport_lat),
                        lng: parseFloat(this.airport_lon)
                    }],
                    options: {
                        icons: [{
                            icon: lineSymbol,
                            offset: '0',
                            repeat: '25px'
                        }],
                        offset: '0',
                        repeat: '35px',
                        strokeOpacity: 0,
                        geodesic: true,
                    }
                }

                this.$refs.windpolyline.$polylinePromise.then(() => {
                    var lineHeading = parseInt(this.wind_direction);

                    var newPt0 = google.maps.geometry.spherical.computeOffset(this.$refs.windpolyline.$polylineObject.getPath().getAt(0), 20000, lineHeading);
                    this.$refs.windpolyline.$polylineObject.getPath().insertAt(0, newPt0);

                    var newPt1 = google.maps.geometry.spherical.computeOffset(this.$refs.windpolyline.$polylineObject.getPath().getAt(1), 20000, lineHeading + 180);
                    this.$refs.windpolyline.$polylineObject.getPath().push(newPt1);
                })

            }

        }
    }
}
</script>

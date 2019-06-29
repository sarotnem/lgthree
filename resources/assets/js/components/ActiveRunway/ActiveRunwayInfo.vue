<template>
<div>
    <active-runway-data :airport_id="airport.id" :metar="airport.metar" :arrival_runway="airport.activeArrivals.designator" :departure_runway="airport.activeDepartures.designator" :weather_station="airport.weather_station">
    </active-runway-data>

    <active-runway-map :airport_id="airport.id" :airport_lat="airport.lat" :airport_lon="airport.lon" :maps_zoom="airport.maps_zoom" :arrival_runway_initial="airport.activeArrivals" :departure_runway_initial="airport.activeDepartures" :metar="airport.metar">
        >
    </active-runway-map>
</div>
</template>

<script>
export default {
    props: ['airport'],
}
</script>

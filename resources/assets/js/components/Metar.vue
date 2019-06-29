<template>
<div class="row">
    <div class="col-12">

        <div class="card card-accent-primary mt-4">
            <div class="card-header">
                METAR
                <small v-if="this.weather_station != ''">( Using weather data from {{ this.weather_station }})</small>
            </div>
            <div class="card-body">
                {{ rawTextNew }}
            </div>
        </div>

    </div>
</div>
</template>

<script>
export default {
    props: ['airport_id', 'raw_text', 'weather_station'],
    data() {
        return {
            rawTextNew: this.raw_text,
        }
    },
    mounted() {
        Echo.channel('weather-tracker.' + this.airport_id)
            .listen('WeatherChanged', (airport) => {
                this.rawTextNew = airport.metar.raw_text
            });
    }
}
</script>

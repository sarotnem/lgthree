<template>
<span>FL {{ calculateTL }}</span>
</template>

<script>
export default {
    props: ['qnh', 'ta'],
    data() {
        return {
            qnhNew: this.qnh,
        }
    },
    computed: {
        calculateTL: function() {
            if (this.qnhNew >= 942 && this.qnhNew <= 959.9)
                return (this.ta + 3000).toString().slice(0,-2)
            else if (this.qnhNew >= 960 && this.qnhNew <= 977.9)
                return (this.ta + 2500).toString().slice(0,-2)
            else if (this.qnhNew >= 978 && this.qnhNew <= 995)
                return (this.ta + 2000).toString().slice(0,-2)
            else if (this.qnhNew >= 995.1 && this.qnhNew <= 1013.2)
                return (this.ta + 1500).toString().slice(0,-2)
            else if (this.qnhNew >= 1013.3 && this.qnhNew <= 1031.6)
                return (this.ta + 1000).toString().slice(0,-2)
            else if (this.qnhNew >= 1031.7 && this.qnhNew <= 1050.3)
                return (this.ta + 500).toString().slice(0,-2)
            else
                return 'Unknown'
        }
    },
    mounted() {
        Echo.channel('weather-tracker.' + this.airport_id)
            .listen('WeatherChanged', (airport) => {
                this.qnhnEW = airport.metar.qnh
            })
    }
}
</script>

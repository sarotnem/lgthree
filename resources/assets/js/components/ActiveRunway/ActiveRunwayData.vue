<template>
<div class="row mt-4">
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-compass bg-orange p-3 font-2xl mr-3"></i>
                <div>
                    <div v-if="this.wind_variable" class="text-value-lg">VRB</div>
                    <div v-else-if="this.wind_calm" class="text-value-lg">CALM</div>
                    <div v-else-if="this.wind_direction.toString().length < 3" class="text-value-lg">0{{ wind_direction }}<span>°</span></div>
                    <div v-else class="text-value-lg">{{ wind_direction }}<span>°</span></div>
                    <div class="text-muted text-uppercase font-weight-bold small">WIND DIRECTION</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-tachometer bg-yellow p-3 font-2xl mr-3"></i>
                <div>
                    <div v-if="this.wind_gust" class="text-value-lg">{{ wind_speed }}G{{ wind_gust }}</div>
                    <div v-else-if="this.wind_calm" class="text-value-lg">CALM</div>
                    <div v-else class="text-value-lg">{{ wind_speed }} <span>KT</span></div>
                    <div class="text-muted text-uppercase font-weight-bold small">WIND SPEED</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-success p-3 mr-3">
                    <i class="fa fa-plane font-2xl" style="transform:rotate(60deg)"></i>
                </div>
                <div>
                    <div class="text-value-lg">{{ arrivalsNew }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">ARRIVAL RWY</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-danger p-3 mr-3">
                    <i class="fa fa-plane font-2xl" style="transform:rotate(20deg)"></i>
                </div>
                <div>
                    <div class="text-value-lg">{{ departuresNew }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">DEPARTURE RWY</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 text-left">
        <small>Last Update: <timeago :since="$moment.utc(this.observation_time)" :auto-update="60"></timeago></small>
    </div>

</div>
</template>

<script>
import VueMomentLib from 'vue-moment-lib';
Vue.use(VueMomentLib)

import VueTimeago from 'vue-timeago'
Vue.use(VueTimeago)

import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
Vue.use(VueIziToast)

export default {
    props: ['airport_id', 'metar', 'arrival_runway', 'departure_runway', 'weather_station'],
    data() {
        return {
            wind_direction: this.metar.wind_direction,
            wind_speed: this.metar.wind_speed,
            arrivalsNew: this.arrival_runway,
            departuresNew: this.departure_runway,
            observation_time: this.metar.observation_time,
            wind_gust: this.metar.wind_gust,
            wind_variable: this.metar.wind_variable,
            wind_calm: this.metar.wind_calm,
            notificationSystem: {
                options: {
                    show: {
                        theme: 'light',
                        position: 'topRight',
                        layout: 1,
                        animateInside: true,
                        drag: true,
                        timeout: 60000,
                        progressBarColor: "rgb(32, 168, 216)",
                        theme: "dark",
                    }
                }
            }
        }
    },
    mounted() {
        Echo.channel('weather-tracker.' + this.airport_id)
            .listen('WeatherChanged', (airport) => {
                console.log(airport);
                this.wind_direction = airport.metar.wind_direction
                this.wind_speed = airport.metar.wind_speed
                this.arrivalsNew = airport.activeArrivals.designator
                this.departuresNew = airport.activeDepartures.designator
                this.observation_time = airport.metar.observation_time
                this.wind_gust = airport.metar.wind_gust
                this.wind_variable = airport.metar.wind_variable
                this.wind_calm = airport.metar.wind_calm

                this.$toast.show('Weather has been changed', 'Alert!', this.notificationSystem.options.show);
                var audio = new Audio('http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3');
                audio.play();
            });
    }
}
</script>


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('active-runway-data', require('./components/ActiveRunway/ActiveRunwayData.vue'));
Vue.component('active-runway-map', require('./components/ActiveRunway/ActiveRunwayMap.vue'));
Vue.component('active-runway-info', require('./components/ActiveRunway/ActiveRunwayInfo.vue'));
Vue.component('metar', require('./components/Metar.vue'));
Vue.component('favorite', require('./components/Favorite.vue'));
Vue.component('favorites-menu', require('./components/FavoritesMenu.vue'));
Vue.component('airports-map', require('./components/AirportsMap.vue'));
Vue.component('airport-search', require('./components/AirportSearch.vue'));
Vue.component('sids', require('./components/Sids.vue'));
Vue.component('stars', require('./components/Stars.vue'));
Vue.component('charts', require('./components/Charts.vue'));
Vue.component('transition-level', require('./components/TransitionLevel.vue'));

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app',
});

export const bus = new Vue();

require ('jquery/dist/jquery.min.js');

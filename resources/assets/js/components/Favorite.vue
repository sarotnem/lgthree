<template>
<span v-model="favorite">
        <a v-if="isFavorited" @click.prevent="unFavorite()">
            <i  class="favorite-star fa fa-star fa-2x"></i>
        </a>
        <a v-else @click.prevent="favorite()">
            <i  class="favorite-star fa fa-star-o fa-2x"></i>
        </a>
    </span>
</template>

<script>
import { EventBus } from '../bus.js';

export default {
    props: ['airport', 'favorited'],

    data: function() {
        return {
            isFavorited: '',
        }
    },

    mounted() {
        this.isFavorited = this.isFavorite ? true : false;
    },

    computed: {
        isFavorite() {
            return this.favorited;
        },
    },

    methods: {
        favorite() {
            axios.post('/favorite/' + this.airport.id)
                .then((response) => {
                        this.isFavorited = true
                        EventBus.$emit('airport:favorited', this.airport);
                })
    },

    unFavorite() {
        axios.post('/unfavorite/' + this.airport.id)
        .then((response) => {
                this.isFavorited = false
                EventBus.$emit('airport:unfavorited', this.airport);
        })
    }
}
}
</script>

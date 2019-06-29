<template>
<div>
    <favorite-item v-for="favorite in orderedFavorites" :favorite="favorite" :key="favorite.id"></favorite-item>
</div>
</template>

<script>
import {
    EventBus
} from '../bus.js'
import FavoriteItem from './FavoritesMenuItem'

export default {
    props: ['favorites'],
    components: {
        FavoriteItem
    },
    data() {
        return {
            favoritesNew: this.favorites
        }
    },
    computed: {
        orderedFavorites: function() {
            return _.orderBy(this.favoritesNew, 'icao')
        }
    },
    mounted() {
        EventBus.$on('airport:favorited', response => {
            this.favoritesNew.push(response)
        });

        EventBus.$on('airport:unfavorited', response => {
            // this.favoritesNew.splice(this.favoritesNew.indexOf(response.id), 1);
            console.log(response)

            var index = this.favoritesNew.indexOf(response)

            if (index === -1)
              console.log("could not find " + response + "in list: " + this.favoritesNew )
            else
              this.favoritesNew.splice(index, 1)
        });
    },
}
</script>

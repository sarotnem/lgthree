<template>
<table class="table table-striped table-hover">
    <thead class="thead-inverse">
        <th>Point</th>
        <th>Runway</th>
        <th>Departure</th>
        <th>Entry FL</th>
        <th><button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#addStarModal">Add STAR</button></th>
        <add-star-modal :airport_id="this.airport_id" v-on:starAdded="starAdded($event)"></add-star-modal>
    </thead>
    <tbody>
        <star v-for="star in orderedStars" :star="star" :key="star.id" @update:star="onStarUpdated" v-on:starDeleted="starDeleted($event)"></star>
    </tbody>
</table>
</template>

<script>
import Star from './Star'
import AddStarModal from './AddStarModal'

export default {
    components: {
        Star,
        AddStarModal
    },
    props: ['stars_initial', 'airport_id'],
    data() {
        return {
            stars: this.stars_initial
        }
    },
    computed: {
        orderedStars: function() {
            return _.orderBy(this.stars, 'name')
        }
    },
    methods: {
        onStarUpdated: function(mutableStar) {
            const starIndex = _.findIndex(this.stars, star => {
                return star.id === mutableStar.id
            })
            this.stars.splice(starIndex, 1, mutableStar)
        },
        starAdded: function(newStar) {
            this.stars.push(newStar)
        },
        starDeleted: function(deletedStar) {
            this.stars.splice(this.stars.indexOf(deletedStar), 1);
        }
    }
}
</script>

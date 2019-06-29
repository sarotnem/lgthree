<template>
<table class="table table-striped table-hover">
    <thead class="thead-inverse">
        <th>Designator</th>
        <th>Heading</th>
        <th>Preferred Arrival</th>
        <th>Preferred Departure</th>
        <th>ILS</th>
        <th><button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#addRunwayModal">Add Runway</button></th>
        <add-runway-modal :airport_id="this.airport_id" v-on:runwayAdded="runwayAdded($event)"></add-runway-modal>
    </thead>
    <tbody>
        <runway v-for="runway in orderedRunways" :runway_initial="runway" :key="runway.id" v-on:runwayDeleted="runwayDeleted($event)"></runway>
    </tbody>
</table>
</template>

<script>
import Runway from './Runway'
import AddRunwayModal from './AddRunwayModal'

export default {
    components: {
        Runway, AddRunwayModal
    },
    props: ['runways_initial', 'airport_id'],
    data() {
        return {
            runways: this.runways_initial
        }
    },
    computed: {
        orderedRunways: function() {
            return _.orderBy(this.runways, 'designator')
        }
    },
    methods: {
        runwayAdded: function(newRunway) {
          this.runways.push(newRunway)
        },
        runwayDeleted: function(deletedRunway) {
          this.runways.splice(this.runways.indexOf(deletedRunway), 1);
        }
    }
}
</script>

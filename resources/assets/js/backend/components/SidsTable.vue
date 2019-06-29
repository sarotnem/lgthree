<template>
<table class="table table-striped table-hover">
    <thead class="thead-inverse">
        <th>Point</th>
        <th>Runway</th>
        <th>Departure</th>
        <th>Init Alt/FL</th>
        <th>Release FL</th>
        <th><button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#addSidModal">Add SID</button></th>
        <add-sid-modal :airport_id="this.airport_id" v-on:sidAdded="sidAdded($event)"></add-sid-modal>
    </thead>
    <tbody>
        <sid v-for="sid in orderedSids" :sid="sid" :key="sid.id" @update:sid="onSidUpdated" v-on:sidDeleted="sidDeleted($event)"></sid>
    </tbody>
</table>
</template>

<script>
import Sid from './Sid'
import AddSidModal from './AddSidModal'

export default {
    components: {
        Sid,
        AddSidModal
    },
    props: ['sids_initial', 'airport_id'],
    data() {
        return {
            sids: this.sids_initial
        }
    },
    computed: {
        orderedSids: function() {
            return _.orderBy(this.sids, 'name')
        }
    },
    methods: {
        onSidUpdated: function(mutableSid) {
            const sidIndex = _.findIndex(this.sids, sid => {
                return sid.id === mutableSid.id
            })
            this.sids.splice(sidIndex, 1, mutableSid)
        },
        sidAdded: function(newSid) {
            this.sids.push(newSid)
        },
        sidDeleted: function(deletedSid) {
            this.sids.splice(this.sids.indexOf(deletedSid), 1);
        }
    }
}
</script>

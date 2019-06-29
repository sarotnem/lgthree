<template>
<div>
    <div class="row">
        <div class="col-12">
                <b-input-group class="mb-3">
                    <b-form-input v-model="filter" placeholder="Type to Search" />
                    <b-input-group-append>
                        <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
                    </b-input-group-append>
                </b-input-group>
            </b-form-group>
        </div>
    </div>

    <b-table striped hover bordered thead-class="text-center" tbody-class="text-center" :items="items" head-variant="dark" :fields="fields" :filter="filter" @filtered="onFiltered"></b-table>
</div>
</template>

<script>
export default {
    props: ['stars'],
    data() {
        return {
            fields: [{
                    key: 'point',
                    sortable: true
                },
                {
                    key: 'runway',
                    sortable: true
                },
                {
                    key: 'name',
                    sortable: true
                },
                {
                    key: 'entry_flight_level',
                    sortable: false
                },
            ],
            filter: null,
            items: _.orderBy(this.stars, 'name')
        }
    },
    methods: {
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        }
    }
}
</script>

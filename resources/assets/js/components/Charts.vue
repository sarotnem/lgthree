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

    <b-table striped hover bordered thead-class="text-center" tbody-class="text-center" :items="items" head-variant="dark" :fields="fields" :filter="filter" @filtered="onFiltered">
        <template v-if="row.item.tags" slot="tags" slot-scope="row">
          <span v-for="tag in row.item.tags.split(';')" class="badge badge-info mx-1 text-white">{{ tag }}</span>
        </template>
        <template slot="actions" slot-scope="row">
        <a :href="route+''+row.item.name+'.pdf'" class="btn btn-md btn-info" target="_blank">
          View
        </a>
      </template>
    </b-table>

</div>
</template>

<script>
export default {
    props: ['charts', 'route'],
    data() {
        return {
            fields: [{
                    key: 'name',
                    sortable: true
                },
                {
                    key: 'runway',
                    sortable: true
                },
                {
                    key: 'tags',
                    sortable: false
                },
                {
                    key: 'actions',
                    label: 'Actions'
                }
            ],
            filter: null,
            items: _.orderBy(this.charts, 'name'),
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

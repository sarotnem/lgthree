<template>
<tr :class="{ edit: editMode, 'delete': deleteMode }" class="row">
    <td class="col-3">
        <span v-show="!editMode">{{ mutableChart.name }}</span>
        <input v-show="editMode" class="form-control" type="textbox" v-model="mutableChart.name">
    </td>
    <td class="col-1">
        <span v-show="!editMode">{{ mutableChart.runway }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableChart.runway">
    </td>
    <td class="col-6">
        <span v-show="!editMode" style="word-wrap: break-word">{{ mutableChart.tags }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableChart.tags">
    </td>
    <td class="text-right col-2">
        <a target="_blank" :href="'charts/' + mutableChart.name + '.' + mutableChart.extension" v-show="!editMode" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
        <button v-show="!editMode" type="button" class="btn btn-info text-white" @click="edit"><i class="fa fa-pencil"></i></button>
        <button v-show="!editMode" type="button" class="btn btn-danger" v-confirm="{ok: dialog => destroy(chart), message: 'Are you sure you want to delete '+chart.name+'?'}"><i class="fa fa-times"></i></button>
        <button v-show="editMode" type="button" class="btn btn-success" @click="save(mutableChart)">Save</button>
    </td>
</tr>
</template>

<script>
import VuejsDialog from "vuejs-dialog"
Vue.use(VuejsDialog)

export default {
    name: 'chart',
    props: ['chart'],
    data() {
        return {
            editMode: false,
            deleteMode: false,
            mutableChart: {}
        }
    },
    methods: {
        edit: function() {
            this.editMode = true
        },
        save: function(chart) {
            this.editMode = false
            window.axios.put(`/admin/ajax/charts/${chart.id}`, {
                chart
            }).then(() => {
                this.$emit('update:chart', chart)
                this.$toast.success('Chart Edited', chart.name, {
                    position: 'topRight'
                })
            });
        },
        destroy: function(chart) {
            window.axios.delete(`/admin/ajax/charts/${chart.id}`)
                .then(() => {
                    this.deleteMode = true
                    setTimeout(() => {
                        this.$emit('chartDeleted', chart)
                        this.deleteMode = false
                    }, 250)

                });
        },
    },
    watch: {
        chart: {
            handler: function(chart) {
                this.mutableChart = _.clone(chart)
            },
            immediate: true
        }
    }
}
</script>

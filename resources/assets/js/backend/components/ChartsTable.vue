<template>
<table class="table table-striped table-hover">
    <thead class="thead-inverse">
        <tr class="row">
            <th class="col-3">Name</th>
            <th class="col-1">Rwy</th>
            <th class="col-6">Tags</th>
            <th class="col-2"><button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal" data-target="#addChartModal">Add Charts</button></th>
            <add-chart-modal :airport_id="this.airport_id" v-on:chartAdded="chartAdded($event)"></add-chart-modal>
        </tr>
    </thead>
    <tbody>
        <chart v-for="chart in orderedCharts" :chart="chart" :key="chart.id" @update:chart="onChartUpdated" @chartDeleted="chartDeleted($event)"></chart>
    </tbody>
</table>
</template>

<script>
import Chart from './Chart'
import AddChartModal from './AddChartModal'

export default {
    components: {
        Chart, AddChartModal
    },
    props: ['charts_initial', 'airport_id'],
    data() {
        return {
            charts: this.charts_initial
        }
    },
    computed: {
        orderedCharts: function() {
            return _.sortBy(this.charts, 'name')
        }
    },
    methods: {
        onChartUpdated: function(mutableChart) {
            const chartIndex = _.findIndex(this.charts, chart => {
                return chart.id === mutableChart.id
            })
            this.charts.splice(chartIndex, 1, mutableChart)
        },
        chartAdded: function(newChart) {
            this.charts.push(newChart)
        },
        chartDeleted: function(deletedChart) {
            this.charts.splice(this.charts.indexOf(deletedChart), 1);
        }
    }
}
</script>

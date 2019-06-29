<template>
<tr :class="{ 'delete': deleteMode }">
    <td class="font-weight-bold">
        {{ runway.designator }}
    </td>
    <td>
        {{ runway.heading }}
    </td>
    <td>
      <span v-show="runway.preferred_arrival" class="text-success"><i class="fa fa-check fa-2x"></i></span>
      <span v-show="!runway.preferred_arrival" class="text-danger"><i class="fa fa-times fa-2x"></i></span>
    </td>
    <td>
      <span v-show="runway.preferred_departure" class="text-success"><i class="fa fa-check fa-2x"></i></span>
      <span v-show="!runway.preferred_departure" class="text-danger"><i class="fa fa-times fa-2x"></i></span>
    </td>
    <td>
      <span v-show="runway.ils" class="text-success"><i class="fa fa-check fa-2x"></i></span>
      <span v-show="!runway.ils" class="text-danger"><i class="fa fa-times fa-2x"></i></span>
    </td>
    <td class="text-right">
        <button type="button" class="btn btn-info text-white" data-toggle="modal" :data-target="'#editRunwayModal-'+ runway.id ">Edit</button>
        <edit-runway-modal :runway_initial="runway" v-on:runwayEdited="runwayEdited($event)"></edit-runway-modal>
        <button type="button" class="btn btn-danger" v-confirm="{ok: dialog => destroy(runway), message: 'Are you sure you want to delete runway '+runway.designator+'?'}">Delete</button>
    </td>
</tr>
</template>

<script>
import VuejsDialog from "vuejs-dialog"
Vue.use(VuejsDialog)

import EditRunwayModal from './EditRunwayModal'

export default {
    name: 'runway',
    components: {
      EditRunwayModal
    },
    props: ['runway_initial'],
    data() {
        return {
            deleteMode: false,
            runway: this.runway_initial
        }
    },
    methods: {
        runwayEdited: function(runway) {
            this.runway = runway
        },
        destroy: function(runway) {
            window.axios.delete(`/admin/ajax/runways/${runway.id}`)
                .then(() => {
                    this.deleteMode = true
                    setTimeout(() => {
                      this.$emit('runwayDeleted', runway)
                      this.deleteMode = false
                    }, 250)
                });
        },
    }
}
</script>

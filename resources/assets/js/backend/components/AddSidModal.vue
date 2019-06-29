<template>
  <div class="modal fade bd-example-modal-lg" id="addSidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add SID</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
              </div>
              <div class="modal-body">
                  <label for="point">Point</label>
                  <input class="form-control" type="text" name="point" v-model="sid.point">
                  <label for="runway">Runway</label>
                  <input class="form-control" type="text" name="runway" v-model="sid.runway">
                  <label for="name">Departure</label>
                  <input class="form-control" type="text" name="name" v-model="sid.name">
                  <label for="initial">Initial Alt/FL (XXXXft or FLXXX)</label>
                  <input class="form-control" type="text" name="initial_flight_level" :v-model="sid.initial_flight_level">
                  <label for="release">Release FL (FLXXX)</label>
                  <input class="form-control" type="text" name="release_flight_level" v-model="sid.release_flight_level">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success btn-submit" @click="save(sid)">Save</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'add-sid-modal',
  props: ['airport_id'],
  data() {
    return {
      sid: {
        'point' : null,
        'runway': null,
        'name': null,
        'initial_flight_level': null,
        'release_flight_level': null
      }
    }
  },
  methods: {
    save: function(sid) {
      window.axios.post(`/admin/ajax/sids/create`, {
          sid: sid,
          airport_id: this.airport_id
      }).then((response) => {
        this.$emit('sidAdded', response.data)
        $('#addSidModal').modal('hide')
        this.$toast.success('SID Added', response.data.name, {position: 'topRight'});
      });
    }
  }
}
</script>

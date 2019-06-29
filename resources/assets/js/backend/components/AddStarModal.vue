<template>
  <div class="modal fade bd-example-modal-lg" id="addStarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add STAR</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
              </div>
              <div class="modal-body">
                  <label for="point">Point</label>
                  <input class="form-control" type="text" name="point" v-model="star.point">
                  <label for="runway">Runway</label>
                  <input class="form-control" type="text" name="runway" v-model="star.runway">
                  <label for="name">Departure</label>
                  <input class="form-control" type="text" name="name" v-model="star.name">
                  <label for="entry_flight_level">Entry FL (FLXXX)</label>
                  <input class="form-control" type="text" name="entry_flight_level" v-model="star.entry_flight_level">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success btn-submit" @click="save(star)">Save</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'add-star-modal',
  props: ['airport_id'],
  data() {
    return {
      star: {
        'point' : null,
        'runway': null,
        'name': null,
        'entry_flight_level': null,
      }
    }
  },
  methods: {
    save: function(star) {
      window.axios.post(`/admin/ajax/stars/create`, {
          star: star,
          airport_id: this.airport_id
      }).then((response) => {
        this.$emit('starAdded', response.data)
        $('#addStarModal').modal('hide')
        this.$toast.success('STAR Added', response.data.name, {position: 'topRight'});
      });
    }
  }
}
</script>

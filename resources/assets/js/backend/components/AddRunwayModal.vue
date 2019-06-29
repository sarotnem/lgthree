<template>
<div class="modal fade bd-example-modal-lg" id="addRunwayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Runway</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="point">Designator</label>
                        <input class="form-control" type="text" name="designator" v-model="runway.designator">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="point">Heading</label>
                        <input class="form-control" type="text" name="heading" v-model="runway.heading">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="point">Length</label>
                        <input class="form-control" type="text" name="length" v-model="runway.length">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="point">Elevation</label>
                        <input class="form-control" type="text" name="elevation" v-model="runway.elevation">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="point">Glidepath</label>
                        <input class="form-control" type="text" name="glidepath" v-model="runway.glidepath">
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                      <label for="point">Pref. Arr.</label>
                      <toggle-button v-model="runway.preferred_arrival" class="d-block"/>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                      <label for="point">Pref. Dep.</label>
                      <toggle-button v-model="runway.preferred_departure" class="d-block"/>
                    </div>

                    <div class="col-12 my-3 bg-secondary"></div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <label for="point">Arrival Lat</label>
                        <input class="form-control" type="text" name="arrival_lat" v-model="runway.arrival_lat">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <label for="point">Arrival Lon</label>
                        <input class="form-control" type="text" name="arrival_lon" v-model="runway.arrival_lon">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <label for="point">Departure Lat</label>
                        <input class="form-control" type="text" name="departure_lat" v-model="runway.departure_lat">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <label for="point">Departure Lon</label>
                        <input class="form-control" type="text" name="departure_lon" v-model="runway.departure_lon">
                    </div>

                    <div class="col-12 my-3 bg-secondary"></div>

                    <div class="col-lg-2 col-sm-12">
                      <label for="point">ILS</label>
                      <toggle-button v-model="runway.ils" class="d-block"/>
                    </div>
                    <div class="col-lg-10 col-sm-12">
                        <label for="point">ILS Frequency</label>
                        <input class="form-control" type="text" name="ils_frequency" v-model="runway.ils_frequency">
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-submit" @click="save(runway)">Save</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import ToggleButton from 'vue-js-toggle-button'
Vue.use(ToggleButton)

export default {
    name: 'add-runway-modal',
    props: ['airport_id'],
    data() {
        return {
            runway: {
                designator: null,
                preferred_arrival: false,
                preferred_departure: false,
                heading: null,
                length: null,
                elevation: null,
                ils: false,
                ils_frequency: null,
                glidepath: null,
                arrival_lat: null,
                arrival_lon: null,
                departure_lat: null,
                departure_lon: null,
            }
        }
    },
    methods: {
        save: function(runway) {
            window.axios.post(`/admin/ajax/runways/create`, {
                runway: runway,
                airport_id: this.airport_id
            }).then((response) => {
                this.$emit('runwayAdded', response.data)
                $('#addRunwayModal').modal('hide')
                this.$toast.success('Runway Added', response.data.designator, {
                    position: 'topRight'
                });
            });
        }
    }
}
</script>

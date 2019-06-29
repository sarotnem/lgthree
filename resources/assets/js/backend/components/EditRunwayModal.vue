<template>
<div class="modal fade bd-example-modal-lg" :id="'editRunwayModal-'+this.runway.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Runway</h5>
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
                        <toggle-button v-model="runway.preferred_arrival" class="d-block" />
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-2">
                        <label for="point">Pref. Dep.</label>
                        <toggle-button v-model="runway.preferred_departure" class="d-block" />
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
                        <toggle-button v-model="runway.ils" class="d-block" />
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
    name: 'edit-runway-modal',
    props: ['runway_initial'],
    data() {
        return {
            runway: {
                // !!+ converts int to boolean
                id: this.runway_initial.id,
                designator: this.runway_initial.designator,
                preferred_arrival: !!+this.runway_initial.preferred_arrival,
                preferred_departure: !!+this.runway_initial.preferred_departure,
                heading: this.runway_initial.heading,
                length: this.runway_initial.length,
                elevation: this.runway_initial.elevation,
                ils: !!+this.runway_initial.ils,
                ils_frequency: this.runway_initial.ils_frequency,
                glidepath: this.runway_initial.glidepath,
                arrival_lat: this.runway_initial.arrival_lat,
                arrival_lon: this.runway_initial.arrival_lon,
                departure_lat: this.runway_initial.departure_lat,
                departure_lon: this.runway_initial.departure_lon,
            }
        }
    },
    methods: {
        save: function(runway) {
            window.axios.put(`/admin/ajax/runways/${runway.id}`, {
                runway
            }).then((response) => {
                this.$emit('runwayEdited', response.data)
                $('#editRunwayModal-'+response.data.id).modal('hide')
                this.$toast.success('Runway Saved', response.data.designator, {
                    position: 'topRight'
                });
            });
        }
    }
}
</script>

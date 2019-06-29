<template>
<div class="modal fade bd-example-modal-lg" id="addChartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Charts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
            </div>
            <div class="modal-body">
                <vue-dropzone ref="chartsDropzone" id="dropzone" :options="dropzoneOptions" v-on:vdropzone-success="handleChartSaved" v-on:vdropzone-sending="sending"></vue-dropzone>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-submit" @click="save()">Save</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'


export default {
    name: 'add-chart-modal',
    components: {
        vueDropzone: vue2Dropzone
    },
    props: ['airport_id'],
    data() {
        return {
            dropzoneOptions: {
                url: '/admin/ajax/charts/create',
                createImageThumbnails: true,
                thumbnailWidth: 30,
                thumbnailHeight: 30,
                maxFilesize: 0.5,
                autoProcessQueue: false,
                acceptedFiles: 'application/pdf',
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
        }
    },
    methods: {
        sending: function(file, xhr, formData) {
          formData.append('airport_id', this.airport_id);
        },
        save: function(sid) {
            this.$refs.chartsDropzone.processQueue()
        },
        handleChartSaved(file, response) {
            this.$emit('chartAdded', response)
            $('#addChartModal').modal('hide')
        }
    }
}
</script>

<template>
<tr :class="{ edit: editMode, 'delete': deleteMode }">
    <td>
        {{ mutableStar.point }}
    </td>
    <td>
        {{ mutableStar.runway }}
    </td>
    <td>
        <span v-show="!editMode">{{ mutableStar.name }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableStar.name">
    </td>
    <td>
        <span v-show="!editMode">{{ mutableStar.entry_flight_level }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableStar.entry_flight_level">
    </td>
    <td class="text-right">
        <button v-show="!editMode" type="button" class="btn btn-info text-white" @click="edit">Edit</button>
        <button v-show="!editMode" type="button" class="btn btn-danger" v-confirm="{ok: dialog => destroy(star), message: 'Are you sure you want to delete '+star.name+'?'}">Delete</button>
        <button v-show="editMode" type="button" class="btn btn-success" @click="save(mutableStar)">Save</button>
    </td>
</tr>
</template>

<script>
import VuejsDialog from "vuejs-dialog"
Vue.use(VuejsDialog)

export default {
    name: 'star',
    props: ['star'],
    data() {
        return {
            editMode: false,
            deleteMode: false,
            mutableStar: {}
        }
    },
    methods: {
        edit: function() {
            this.editMode = true
        },
        save: function(star) {
            this.editMode = false
            window.axios.put(`/admin/ajax/stars/${star.id}`, {
                star
            }).then(() => {
                this.$emit('update:star', star)
                this.$toast.success('STAR Edited', star.name, {position: 'topRight'})
            });
        },
        destroy: function(star) {
            window.axios.delete(`/admin/ajax/stars/${star.id}`)
                .then(() => {
                    this.deleteMode = true
                    setTimeout(() => {
                        this.$emit('starDeleted', star)
                        this.$toast.error('STAR Deleted', star.name, {position: 'topRight'})
                        this.deleteMode = false
                    }, 250)

                });
        },
    },
    watch: {
        star: {
            handler: function(star) {
                this.mutableStar = _.clone(star)
            },
            immediate: true
        }
    }
}
</script>

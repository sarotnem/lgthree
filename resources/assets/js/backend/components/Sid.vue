<template>
<tr :class="{ edit: editMode, 'delete': deleteMode }">
    <td>
        {{ mutableSid.point }}
    </td>
    <td>
        {{ mutableSid.runway }}
    </td>
    <td>
        <span v-show="!editMode">{{ mutableSid.name }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableSid.name">
    </td>
    <td>
        <span v-show="!editMode">{{ mutableSid.initial_flight_level }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableSid.initial_flight_level">
    </td>
    <td>
        <span v-show="!editMode">{{ mutableSid.release_flight_level }}</span>
        <input v-show="editMode" class="form-control" type="text" v-model="mutableSid.release_flight_level">
    </td>
    <td class="text-right">
        <button v-show="!editMode" type="button" class="btn btn-info text-white" @click="edit">Edit</button>
        <button v-show="!editMode" type="button" class="btn btn-danger" v-confirm="{ok: dialog => destroy(sid), message: 'Are you sure you want to delete '+sid.name+'?'}">Delete</button>
        <button v-show="editMode" type="button" class="btn btn-success" @click="save(mutableSid)">Save</button>
    </td>
</tr>
</template>

<script>
import VuejsDialog from "vuejs-dialog"
Vue.use(VuejsDialog)

export default {
    name: 'sid',
    props: ['sid'],
    data() {
        return {
            editMode: false,
            deleteMode: false,
            mutableSid: {}
        }
    },
    methods: {
        edit: function() {
            this.editMode = true
        },
        save: function(sid) {
            this.editMode = false
            window.axios.put(`/admin/ajax/sids/${sid.id}`, {
                sid
            }).then(() => {
                this.$emit('update:sid', sid)
                this.$toast.success('SID Edited', sid.name, {position: 'topRight'})
            });
        },
        destroy: function(sid) {
            window.axios.delete(`/admin/ajax/sids/${sid.id}`)
                .then(() => {
                    this.deleteMode = true
                    setTimeout(() => {
                        this.$emit('sidDeleted', sid)
                        this.$toast.error('SID Deleted', sid.name, {position: 'topRight'})
                        this.deleteMode = false
                    }, 250)

                });
        },
    },
    watch: {
        sid: {
            handler: function(sid) {
                this.mutableSid = _.clone(sid)
            },
            immediate: true
        }
    }
}
</script>

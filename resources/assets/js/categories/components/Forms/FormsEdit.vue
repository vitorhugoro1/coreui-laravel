<template>
    <div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Form</h4>
                        <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" v-model="formEdited.name">
                            </div>
                            <div class="form-group">
                                <label for="weapon">Weapon</label>
                                <select id="weapon" class="form-control" v-model="formEdited.weapon">
                                    <option value="false">Not</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="team">Team</label>
                                <select id="team" class="form-control" v-model="formEdited.team">
                                    <option value="false">Not</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id='close-edit' class="btn btn-secondary" data-dismiss="modal" @click="close">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="update(formEdited, id)">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: 'forms-edit',
    computed: mapGetters("forms", {
        id: "getEditingId",
        formEdited: "getEditing"
    }),
    methods: {
        update(form, id) {
            this.$store.dispatch('forms/updateForm', { id, form });

            if (!this.$store.state.forms.isErrorAction) {
                document.getElementById("close-edit").click();
            }
        },
        close() {
            this.$emit('close');
        }
    }
}
</script>
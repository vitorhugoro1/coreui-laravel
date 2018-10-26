<template>
    <div>
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <input type="text" class="form-control" id="name" v-model="form.name">
                            </div>
                            <div class="form-group">
                                <label for="weapon">Weapon</label>
                                <select id="weapon" class="form-control" v-model="form.weapon">
                                    <option value="false">Not</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="team">Team</label>
                                <select id="team" class="form-control" v-model="form.team">
                                    <option value="false">Not</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id='close-add' class="btn btn-secondary" data-dismiss="modal" @click="close">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="add(form)">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'forms-add',
    data: () => ({
        form: {
            name: '',
            weapon: false,
            team: false
        }
    }),
    methods: {
        add(form) {
            this.$store.dispatch("forms/addForm", form);

            if (!this.$store.state.forms.isErrorAction) {
                this.form = {
                    name: '',
                    weapon: false,
                    team: false
                };
                document.getElementById("close-add").click();
            }
        },
        close() {
            this.common = {
                name: '',
                weapon: false,
                team: false
            };
            this.$emit("close");
        }
    }
}
</script>
<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Name</th>
                    <th>Weapon</th>
                    <th>Team</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(form, key) in forms" :key="key">
                    <td><input type="checkbox"></td>
                    <td>{{ form.name }}</td>
                    <td>{{ form.weapon }}</td>
                    <td>{{ form.team }}</td>
                    <td>
                        <button @click="openEdit(key)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
                        <button @click="remove(key)" type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
                <tr v-if="forms.length === 0">
                    <td colspan="4">
                        <span class="text-bold">Not forms added</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <forms-edit v-show="isEditing" @close="closeEdit"></forms-edit>
    </div>
</template>

<script>
import FormsEdit from './FormsEdit';
import { mapState } from "vuex";

export default {
    name: 'forms-table',
    components: {
        FormsEdit
    },
    computed: mapState("forms", {
        forms: state => state.forms,
        formEditing: state => state.formEditing
    }),
    data: () => ({
        isEditing: false
    }),
    methods: {
        openEdit(id) {
            this.$store.dispatch("forms/isFormEditing", id);
            this.isEditing = true;
        },
        closeEdit() {
            this.$store.dispatch("forms/notFormEditing");
            this.isEditing = false;
        },
        remove(id) {
            this.$store.dispatch("forms/removeForm", id);
        }
    },
    created() {
        this.$store.dispatch("forms/getAllForms");
    }
}
</script>
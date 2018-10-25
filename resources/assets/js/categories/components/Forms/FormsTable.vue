<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Name</th>
                    <th>Weapon</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(form, key) in forms" :key="key">
                    <td><input type="checkbox"></td>
                    <td>{{ form.name }}</td>
                    <td>{{ form.weapon }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
                        <button type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
                <tr v-if="forms.length === 0">
                    <td colspan="4">
                        <span class="text-bold">Not forms added</span>
                    </td>
                </tr>
            </tbody>
        </table>
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
    created() {
        this.$store.dispatch("forms/getAllForms");
    }
}
</script>
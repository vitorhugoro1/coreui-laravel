<script>
export default {
    name: 'male-table',
    props: ['data', 'target']
}
</script>

<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Initial</th>
                    <th>Max</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(value, id) in data" :key="id">
                    <td><input type="checkbox"></td>
                    <td>{{ value.min }}</td>
                    <td>{{ value.max }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" @click="edit(id)" data-toggle="modal" :data-target="`#${target}-edit`">Edit</button>
                        <button type="button" class="btn btn-danger" @click="remove(id)">Remove</button>
                    </td>
                </tr>
                <tr v-if="data.length === 0">
                    <td colspan="4">
                    <span class="text-bold">Not weights added</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

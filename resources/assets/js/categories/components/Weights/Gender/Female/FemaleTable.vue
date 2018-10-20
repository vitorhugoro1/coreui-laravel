<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>Initial</th>
                <th>Max</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(male, key) in males" :key="key">
                <td><input type="checkbox"></td>
                <td>{{ male.initial }}</td>
                <td>{{ male.max }}</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
  export default {
    name: 'male-table'
  }
</script>

<style scoped></style>
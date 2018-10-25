<template>
    <div class="tab-pane active show table-resposive" id="pane">
        <button type="button" @click="isAdding = true" class="pull-right my-2 btn btn-success" data-toggle="modal" data-target="#add">Add</button>
        <forms-table></forms-table>
        <forms-add v-show="isAdding" @close="isAdding = false"></forms-add>
    </div>
</template>

<script>
import FormsTable from './FormsTable';
import FormsAdd from './FormsAdd';

export default {
    name: 'forms-pane',
    components: {
        FormsTable,
        FormsAdd
    },
    data: () => ({
        isAdding: false
    })
}
</script>
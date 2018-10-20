<template>
    <div class="tab-pane show active" id="male" role="tabpanel">
        <button @click="isAdding = true" type="button" class="pull-right my-2 btn btn-success" data-toggle="modal" data-target="#male-add">Add</button>
        <male-table></male-table>
        <male-add v-show="isAdding" @close="isAdding = false"></male-add>
    </div>
</template>

<script>
import MaleTable from './MaleTable';
import MaleAdd from './MaleAdd';

export default {
  name: 'male-pane',
  components: {
    MaleTable,
    MaleAdd
  },
  data: () => ({
    isAdding: false
  })
}
</script>

<style scoped></style>
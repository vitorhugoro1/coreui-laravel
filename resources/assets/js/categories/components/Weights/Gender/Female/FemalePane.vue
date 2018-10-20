<template>
    <div class="tab-pane show active" id="male" role="tabpanel">
        <button type="button" class="pull-right my-2 btn btn-success">Add</button>
        <male-table></male-table>
    </div>
</template>

<script>
import MaleTable from './MaleTable'
export default {
  name: 'male-pane',
  components: {
    MaleTable
  }
}
</script>

<style scoped></style>
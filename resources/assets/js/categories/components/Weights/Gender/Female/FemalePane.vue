<template>
  <div class="tab-pane" id="female" role="tabpanel">
    <button
      @click="isAdding = true"
      type="button"
      class="pull-right my-2 btn btn-success"
      data-toggle="modal"
      data-target="#female-add"
    >Add</button>
    <female-table></female-table>
    <female-add v-show="isAdding" @close="isAdding = false"></female-add>
    <input
      type="hidden"
      name="females"
      :value="JSON.stringify($store.state.genders.females.females)"
    >
  </div>
</template>

<script>
import FemaleTable from "./FemaleTable";
import FemaleAdd from "./FemaleAdd";

export default {
  name: "female-pane",
  components: {
    FemaleTable,
    FemaleAdd
  },
  data: () => ({
    isAdding: false
  })
};
</script>

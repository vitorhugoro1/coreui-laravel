<template>
    <div class="tab-pane active show table-responsive" id="common" role="tabpanel">
        <button @click="isAdding = true" type="button" class="pull-right my-2 btn btn-success" data-toggle="modal" data-target="#common-add">Add</button>
        <common-table></common-table>
        <common-add v-show="isAdding" @close="isAdding = false"></common-add>
        <input type="hidden" name="common" :value="JSON.stringify($store.state.common.commons)">
    </div>
</template>

<script>
import CommonTable from "./CommonTable";
import CommonAdd from "./CommonAdd";

export default {
  name: "commons-pane",
  components: {
    CommonTable,
    CommonAdd
  },
  data: () => ({
    isAdding: false
  })
};
</script>
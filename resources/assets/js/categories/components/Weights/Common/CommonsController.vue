<template>
    <div>
        <button @click="isAdding = true" type="button" class="pull-right my-2 btn btn-success" data-toggle="modal" data-target="#common-add">Add</button>
        <common-table></common-table>
        <common-add v-show="isAdding" @close="isAdding = false"></common-add>
    </div>
</template>

<script>
import CommonTable from "./CommonTable";
import CommonAdd from "./CommonAdd";
import { mapState, mapMutations } from "vuex";

export default {
  name: "commons-controller",
  components: {
    CommonTable,
    CommonAdd
  },
  data: () => ({
    isAdding: false
  })
};
</script>
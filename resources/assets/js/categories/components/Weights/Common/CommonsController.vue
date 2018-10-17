<template>
    <div>
        <button type="button" class="pull-right my-2 btn btn-success">Add</button>
        <common-table :commons="commons" @update="updateCommon" @remove="removeCommon"></common-table>
    </div>
</template>

<script>
import CommonTable from "./CommonTable";

export default {
  name: "commons-controller",
  props: ["commons"],
  components: {
    CommonTable
  },
  methods: {
    updateCommon(common) {
      this.$emit("update", common, "common");
    },
    removeCommon(id) {
      this.$emit("remove", id, "common");
    }
  }
};
</script>
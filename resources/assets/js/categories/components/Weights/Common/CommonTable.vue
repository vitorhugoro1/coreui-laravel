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
                <tr v-for="(common, key) in commons" :key="key">
                    <td><input type="checkbox"></td>
                    <td>{{ common.initial }}</td>
                    <td>{{ common.max }}</td>
                    <td>
                        <button @click="openEdit(common, key)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#common-edit">Edit</button>
                        <button @click="removeCommon(key)" type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <common-edit v-show="isCommonEdit" :common="isCommonEditing" :common-id="isCommonEditingId" @close="closeEdit" @updateCommon="updateCommon"></common-edit>
    </div>
</template>

<script>
import CommonEdit from "./CommonEdit";

export default {
  name: "common-table",
  props: ["commons"],
  components: {
    CommonEdit
  },
  data: () => ({
    isCommonEdit: false,
    isCommonEditing: {},
    isCommonEditingId: 0
  }),
  methods: {
    openEdit(common, id) {
      this.isCommonEditing = common;
      this.isCommonEditingId = id;
      this.isCommonEdit = true;
    },
    closeEdit() {
      this.isCommonEdit = false;
      this.isCommonEditing = {};
    },
    updateCommon(common) {
      this.$emit("update", common);
    },
    removeCommon(id) {
      this.$emit("remove", id);
    }
  }
};
</script>
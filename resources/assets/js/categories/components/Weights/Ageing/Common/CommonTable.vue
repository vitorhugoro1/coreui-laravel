<script>
import CommonEdit from "./CommonEdit";

export default {
  name: "common-table",
  props: ["data", "target"],
  components: {
    CommonEdit
  },
  data: () => ({
    isEditing: false
  }),
  methods: {
    edit(id) {
      const target = this.target;

      this.$store.dispatch("ageing/common/isCommonEditing", { id, target });
      this.isEditing = true;
    },
    close() {
      this.$store.dispatch("ageing/common/notCommonEditing");
      this.isEditing = false;
    },
    remove(id) {
      const target = this.target;
      this.$store.dispatch("ageing/common/removeCommon", { id, target });
    }
  }
};
</script>

<template>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>
            <input type="checkbox">
          </th>
          <th>Initial</th>
          <th>Max</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(value, key) in data" :key="key">
          <td>
            <input type="checkbox">
          </td>
          <td>{{ value.min }}</td>
          <td>{{ value.max }}</td>
          <td>
            <button
              @click="edit(key)"
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              :data-target="`#common-${target}-edit`"
            >Edit</button>
            <button @click="remove(key)" type="button" class="btn btn-danger">Remove</button>
          </td>
        </tr>
        <tr v-if="data.length === 0">
          <td colspan="4">
            <span class="text-bold">Not weights added</span>
          </td>
        </tr>
      </tbody>
    </table>

    <common-edit v-show="isEditing" :target="target" @close="close"></common-edit>
  </div>
</template>
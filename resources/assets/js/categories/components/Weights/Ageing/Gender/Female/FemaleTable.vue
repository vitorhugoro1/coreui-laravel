<script>
import FemaleEdit from "./FemaleEdit";

export default {
  name: "female-table",
  props: ["data", "target"],
  components: {
    FemaleEdit
  },
  data: () => ({
    isEditing: false
  }),
  methods: {
    remove(id) {
      const target = this.target;
      this.$store.dispatch("ageing/females/removeFemale", { id, target });

      if (this.$store.state.ageing.isErrorAction) {
        alert("COLOCAR UM ERRO!");
      }
    },
    edit(id) {
      const target = this.target;

      this.$store.dispatch("ageing/females/isFemaleEditing", { id, target });
      this.isEditing = true;
    },
    close() {
      this.$store.dispatch("ageing/females/notFemaleEditing");
      this.isEditing = false;
    }
  }
};
</script>

<template>
  <div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Initial</th>
          <th>Max</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(value, id) in data" :key="id">
          <td>
            <input type="checkbox">
          </td>
          <td>{{ value.min }}</td>
          <td>{{ value.max }}</td>
          <td>
            <button
              type="button"
              class="btn btn-primary"
              @click="edit(id)"
              data-toggle="modal"
              :data-target="`#female-${target}-edit`"
            >Edit</button>
            <button type="button" class="btn btn-danger" @click="remove(id)">Remove</button>
          </td>
        </tr>
        <tr v-if="data.length === 0">
          <td colspan="4">
            <span class="text-bold">Not weights added</span>
          </td>
        </tr>
      </tbody>
    </table>

    <female-edit v-show="isEditing" :target="target" @close="close"></female-edit>
  </div>
</template>

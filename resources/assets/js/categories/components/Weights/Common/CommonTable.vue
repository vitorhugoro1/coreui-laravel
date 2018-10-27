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
                    <td>{{ common.min }}</td>
                    <td>{{ common.max }}</td>
                    <td>
                        <button @click="openEdit(key)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#common-edit">Edit</button>
                        <button @click="removeCommon(key)" type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
                <tr v-if="commons.length === 0">
                  <td colspan="4">
                    <span class="text-bold">Not weights added</span>
                  </td>
                </tr>
            </tbody>
        </table>

        <common-edit v-show="isCommonEdit" @close="closeEdit"></common-edit>
    </div>
</template>

<script>
import CommonEdit from "./CommonEdit";
import { mapState } from "vuex";

export default {
  name: "common-table",
  computed: mapState("common", {
    commons: state => state.commons,
    commonEditing: state => state.commonEditing
  }),
  components: {
    CommonEdit
  },
  data: () => ({
    isCommonEdit: false
  }),
  methods: {
    openEdit(id) {
      this.$store.dispatch("common/isCommonEditing", id);
      this.isCommonEdit = true;
    },
    closeEdit() {
      this.$store.dispatch("common/notCommonEditing");
      this.isCommonEdit = false;
    },
    removeCommon(id) {
      this.$store.dispatch("common/removeCommon", id);
    }
  },
  created() {
    this.$store.dispatch("common/getAllCommons");
  }
};
</script>
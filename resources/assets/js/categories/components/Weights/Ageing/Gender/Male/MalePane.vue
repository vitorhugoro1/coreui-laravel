<script>
import { mapState } from "vuex";
import MaleAdd from "./MaleAdd";
import MaleTable from "./MaleTable";

export default {
  name: "male-pane",
  components: {
    MaleTable,
    MaleAdd
  },
  data: () => ({
    isAdding: false
  }),
  computed: mapState("ageing/males", {
    ageings: "males"
  }),
  created() {
    this.$store.dispatch("ageing/males/getAllMales");
  }
};
</script>

<template>
  <div class="tab-pane show active" id="male" role="tabpanel">
    <div class="accordion" id="malePaneAccordion">
      <div class="card mb-0" v-for="(ageing, key) in ageings" :key="key">
        <div class="card-header">
          <h5 class="mb-0">
            <a
              class="btn btn-link"
              data-toggle="collapse"
              :data-target="`#male-${ageing.key}`"
            >{{ ageing.name }}</a>
          </h5>
        </div>
        <div class="collapse" :id="`male-${ageing.key}`" data-parent="#malePaneAccordion">
          <div class="card card-body mb-0">
            <button
              @click="isAdding = true"
              type="button"
              class="col-lg-1 pull-right my-2 btn btn-success"
              data-toggle="modal"
              :data-target="`#male-${ageing.key}-add`"
            >Add</button>
            <male-table :data="ageing.data || []" :target="ageing.key"></male-table>
            <male-add :target="ageing.key" v-show="isAdding" @close="isAdding = false"></male-add>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import FemaleAdd from "./FemaleAdd";
import FemaleTable from "./FemaleTable";

export default {
  name: "female-pane",
  components: {
    FemaleTable,
    FemaleAdd
  },
  data: () => ({
    isAdding: false
  }),
  computed: mapState("ageing/females", {
    ageings: "females"
  }),
  created() {
    this.$store.dispatch("ageing/females/getAllFemales");
  }
};
</script>

<template>
  <div class="tab-pane" id="female" role="tabpanel">
    <div class="accordion" id="femalePaneAccordion">
      <div class="card mb-0" v-for="(ageing, key) in ageings" :key="key">
        <div class="card-header">
          <h5 class="mb-0">
            <a
              class="btn btn-link"
              data-toggle="collapse"
              :data-target="`#female-${ageing.key}`"
            >{{ ageing.name }}</a>
          </h5>
        </div>
        <div class="collapse" :id="`female-${ageing.key}`" data-parent="#femalePaneAccordion">
          <div class="card card-body mb-0">
            <button
              @click="isAdding = true"
              type="button"
              class="col-lg-1 pull-right my-2 btn btn-success"
              data-toggle="modal"
              :data-target="`#female-${ageing.key}-add`"
            >Add</button>
            <female-table :data="ageing.data || []" :target="ageing.key"></female-table>
            <female-add :target="ageing.key" v-show="isAdding" @close="isAdding = false"></female-add>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

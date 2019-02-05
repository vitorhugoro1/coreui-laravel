<script>
import { mapState } from "vuex";
import CommonTable from "./CommonTable";
import CommonAdd from "./CommonAdd";

export default {
  name: "common-pane",
  components: {
    CommonTable,
    CommonAdd
  },
  data: () => ({
    isAdding: false
  }),
  computed: mapState("ageing/common", {
    ageings: "commons"
  }),
  created() {
    this.$store.dispatch("ageing/common/getAllCommons");
  }
};
</script>

<template>
  <div class="tab-pane active show table-responsive" id="common" role="tabpanel">
    <div class="accordion" id="commonPaneAccordion">
      <div class="card mb-0" v-for="(ageing, key) in ageings" :key="key">
        <div class="card-header">
          <h5 class="mb-0">
            <a
              class="btn btn-link"
              data-toggle="collapse"
              :data-target="`#common-${ageing.key}`"
            >{{ ageing.name }}</a>
          </h5>
        </div>
        <div class="collapse" :id="`common-${ageing.key}`" data-parent="#commonPaneAccordion">
          <div class="card card-body mb-0">
            <button
              @click="isAdding = true"
              type="button"
              class="pull-right my-2 btn btn-success"
              data-toggle="modal"
              :data-target="`#common-${ageing.key}-add`"
            >Add</button>
            <common-table :data="ageing.data || []" :target="ageing.key"></common-table>
            <common-add :target="ageing.key" v-show="isAdding" @close="isAdding = false"></common-add>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="common" :value="JSON.stringify($store.state.ageing.common.commons)">
  </div>
</template>

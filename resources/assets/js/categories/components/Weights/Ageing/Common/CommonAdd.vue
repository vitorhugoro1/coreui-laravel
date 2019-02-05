<script>
export default {
  name: "common-add",
  props: ["target"],
  data: () => ({
    common: {
      min: 0,
      max: 0
    }
  }),
  methods: {
    add(common) {
      const target = this.target;
      this.$store.dispatch("ageing/common/addCommon", { common, target });

      if (!this.$store.state.ageing.isErrorAction) {
        this.common = {
          min: 0,
          max: 0
        };
        document.getElementById(`close-common-${target}-add`).click();
      }
    },
    close() {
      this.common = {
        min: 0,
        max: 0
      };
      this.$emit("close");
    }
  }
};
</script>

<template>
  <div>
    <div
      class="modal fade"
      :id="`common-${target}-add`"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Common</h4>
            <button
              type="button"
              class="close"
              @click="close"
              data-dismiss="modal"
              aria-label="Cancel"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form">
              <div class="form-group">
                <label for="initial">Initial</label>
                <input type="text" class="form-control" id="initial" v-model.number="common.min">
              </div>
              <div class="form-group">
                <label for="max">Max</label>
                <input type="text" class="form-control" id="max" v-model.number="common.max">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              :id="`close-common-${target}-add`"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="close"
            >Cancel</button>
            <button type="button" class="btn btn-primary" @click="add(common)">Add Common</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
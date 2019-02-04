<script>
export default {
  name: "female-add",
  props: ["target"],
  data: () => ({
    female: {
      min: 0,
      max: 0
    }
  }),
  methods: {
    add(female) {
      const target = this.target;
      this.$store.dispatch("ageing/females/addFemale", { female, target });

      if (!this.$store.state.ageing.isErrorAction) {
        this.female = {
          min: 0,
          max: 0
        };
        document.getElementById(`close-female-${target}-add`).click();
      }
    },
    close() {
      this.female = {
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
      :id="`female-${target}-add`"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Female</h4>
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
                <input type="text" class="form-control" id="initial" v-model.number="female.min">
              </div>
              <div class="form-group">
                <label for="max">Max</label>
                <input type="text" class="form-control" id="max" v-model.number="female.max">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              :id="`close-female-${target}-add`"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="close"
            >Cancel</button>
            <button type="button" class="btn btn-primary" @click="add(female)">Add Female</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

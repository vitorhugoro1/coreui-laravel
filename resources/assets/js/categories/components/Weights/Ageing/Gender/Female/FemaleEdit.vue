<template>
  <div>
    <div
      class="modal fade"
      :id="`female-${target}-edit`"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Female</h4>
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
                <input
                  type="text"
                  class="form-control"
                  id="initial"
                  v-model.number="femaleEdited.min"
                >
              </div>
              <div class="form-group">
                <label for="max">Max</label>
                <input type="text" class="form-control" id="max" v-model.number="femaleEdited.max">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              :id="`close-female-${target}-edit`"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="close"
            >Cancel</button>
            <button
              type="button"
              class="btn btn-primary"
              @click="update(femaleEdited, id)"
            >Edit Female</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "female-edit",
  props: ["target"],
  computed: mapGetters("ageing/females", {
    id: "getFemaleEditingId",
    femaleEdited: "getFemaleEditing"
  }),
  methods: {
    update(female, id) {
      const target = this.target;
      this.$store.dispatch("ageing/females/updateFemale", {
        id,
        female,
        target
      });

      if (!this.$store.state.ageing.isErrorAction) {
        document.getElementById(`close-female-${target}-edit`).click();
      }
    },
    close() {
      this.$emit("close");
    }
  }
};
</script>
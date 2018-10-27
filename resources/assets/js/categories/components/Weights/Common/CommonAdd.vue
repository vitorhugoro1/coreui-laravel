<template>
    <div>
        <div class="modal fade" id="common-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Common</h4>
                        <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
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
                        <button type="button" id='close-common-add' class="btn btn-secondary" data-dismiss="modal" @click="close">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="addCommon(common)">Add Common</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "common-add",
  data: () => ({
    common: {
      min: 0,
      max: 0
    }
  }),
  methods: {
    addCommon(common) {
      this.$store.dispatch("common/addCommon", common);

      if (!this.$store.state.common.isErrorAction) {
        this.common = {
          min: 0,
          max: 0
        };
        document.getElementById("close-common-add").click();
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
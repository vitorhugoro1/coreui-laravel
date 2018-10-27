<template>
    <div>
        <div class="modal fade" id="common-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Common</h4>
                        <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="initial">Initial</label>
                                <input type="text" class="form-control" id="initial" v-model.number="commonEdited.min">
                            </div>
                            <div class="form-group">
                                <label for="max">Max</label>
                                <input type="text" class="form-control" id="max" v-model.number="commonEdited.max">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id='close-common-edit' class="btn btn-secondary" data-dismiss="modal" @click="close">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="updateCommon(commonEdited, id)">Edit Common</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "common-edit",
  computed: mapGetters("common", {
    id: "getEditingId",
    commonEdited: "getEditing"
  }),
  methods: {
    updateCommon(common, id) {
      this.$store.dispatch("common/updateCommon", { id, common });

      if (!this.$store.state.common.isErrorAction) {
        document.getElementById("close-common-edit").click();
      }
    },
    close() {
      this.$emit("close");
    }
  }
};
</script>
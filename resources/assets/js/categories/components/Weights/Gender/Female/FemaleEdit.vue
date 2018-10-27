<template>
  <div>
      <div class="modal fade" id="female-edit" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Female</h4>
                      <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form">
                          <div class="form-group">
                              <label for="initial">Initial</label>
                              <input type="text" class="form-control" id="initial"
                                      v-model.number="femaleEdited.min">
                          </div>
                          <div class="form-group">
                              <label for="max">Max</label>
                              <input type="text" class="form-control" id="max" v-model.number="femaleEdited.max">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" id='close-female-edit' class="btn btn-secondary" data-dismiss="modal"
                              @click="close">Cancel
                      </button>
                      <button type="button" class="btn btn-primary" @click="update(femaleEdited, id)">Edit Female
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  name: 'female-edit',
  computed: mapGetters("genders/females", {
    id: "getFemaleEditingId",
    femaleEdited: "getFemaleEditing"
  }),
  methods: {
    update(female, id) {
      this.$store.dispatch('genders/females/updateFemale', { id, female });

      if (!this.$store.state.genders.isErrorAction) {
          document.getElementById("close-female-edit").click();
      }
    },
    close() {
      this.$emit('close')
    }
  }
}
</script>
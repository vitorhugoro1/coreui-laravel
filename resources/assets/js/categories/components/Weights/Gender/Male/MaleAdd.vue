<template>
  <div>
      <div class="modal fade" id="male-add" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add Male</h4>
                      <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form">
                          <div class="form-group">
                              <label for="initial">Initial</label>
                              <input type="text" class="form-control" id="initial" v-model.number="male.min">
                          </div>
                          <div class="form-group">
                              <label for="max">Max</label>
                              <input type="text" class="form-control" id="max" v-model.number="male.max">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" id='close-male-add' class="btn btn-secondary" data-dismiss="modal" @click="close">Cancel</button>
                      <button type="button" class="btn btn-primary" @click="add(male)">Add Male</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'male-add',
  data: () => ({
    male: {
      min: 0,
      max: 0
    }
  }),
  methods: {
    add(male) {
      this.$store.dispatch("genders/males/addMale", male);

      if (!this.$store.state.genders.isErrorAction) {
        this.male = {
          min: 0,
          max: 0
        };
        document.getElementById("close-male-add").click();
      }
    },
    close() {
      this.male = {
        min: 0,
        max: 0
      };
      this.$emit("close");
    }
  }
}
</script>

<style scoped></style>
<template>
  <div>
    <div class="modal fade" :id="idModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form class="modal-content" @submit.prevent="addOrganizator">
          <div class="modal-header">
            <h4 class="modal-title">Add Organizator</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="organizator.name">
              </div>
              <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" v-model="organizator.contact">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" v-model="organizator.address">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" v-model="organizator.email">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              :id="`${idModal}-close`"
            >Cancel</button>
            <button type="submit" class="btn btn-primary">Add Organizator</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "add-organizator-modal",
  props: {
    user: {
      type: Number,
      default: 1
    },
    idModal: {
      type: String,
      default: "organizator-modal"
    }
  },
  data: () => ({
    organizator: {
      name: "",
      contact: "",
      address: "",
      email: ""
    }
  }),
  methods: {
    addOrganizator() {
      this.$store.dispatch("organizers/add", this.organizator);

      if (!this.$store.state.errorApi) {
        document.getElementById(`${this.idModal}-close`).click();
      }
    }
  }
};
</script>
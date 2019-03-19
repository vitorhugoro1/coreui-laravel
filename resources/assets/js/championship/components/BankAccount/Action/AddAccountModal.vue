<template>
  <div>
    <div class="modal fade" :id="idModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form class="modal-content" @submit.prevent="addAccount">
          <div class="modal-header">
            <h4 class="modal-title">Add Bank Account</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="account.name">
              </div>
              <div class="form-group">
                <label for="account_owner">Account Owner</label>
                <input
                  type="text"
                  class="form-control"
                  id="account_owner"
                  v-model="account.account_owner"
                >
              </div>
              <div class="form-group">
                <label for="owner_document">Owner Document</label>
                <input
                  type="text"
                  class="form-control"
                  id="owner_document"
                  v-model="account.owner_document"
                  v-mask="'###.###.###-##'"
                >
                <small class="form-text text-muted">Only brazillian bank accounts.</small>
              </div>
              <div class="form-group">
                <label for="bank">Bank</label>
                <v-select
                  v-model="account.bank"
                  inputId="bank"
                  :options="banks"
                  placeholder="Select an Bank"
                ></v-select>
              </div>
              <div class="form-group">
                <label for="agency">Agency</label>
                <input
                  type="text"
                  class="form-control"
                  id="agency"
                  v-model="account.agency"
                  v-mask="['###', '####', '####-#']"
                >
              </div>
              <div class="form-group">
                <label for="account_number">Account Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="account_number"
                  v-model="account.account_number"
                  v-mask="['###-#', '####-#', '#####-#', '######-#']"
                >
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
            <button type="submit" class="btn btn-primary">Add Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mask } from "vue-the-mask";

export default {
  name: "add-account-modal",
  directives: { mask },
  props: {
    user: {
      type: Number,
      default: 1
    },
    idModal: {
      type: String,
      default: "account-modal"
    }
  },
  data: () => ({
    account: {
      name: "",
      account_owner: "",
      owner_document: "",
      bank: "",
      agency: "",
      account_number: ""
    },
    banks: ["Bradesco", "Banco do Brasil", "Itaú"]
  }),
  methods: {
    addAccount() {
      this.$store.dispatch("banks/add", this.account);

      if (!this.$store.state.errorApi) {
        document.getElementById(`${this.idModal}-close`).click();
      }
    }
  }
};
</script>
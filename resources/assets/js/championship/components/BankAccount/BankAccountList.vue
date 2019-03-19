<template>
  <div>
    <table-component
      :data="bank_accounts"
      table-class="table table-striped table-responsive-sm"
      filter-input-class="mb-md-2 form-control col-md-3 float-right"
      :show-caption="false"
    >
      <table-column show="id" label="#" :filterable="false" :sortable="false">
        <template slot-scope="row">
          <input type="checkbox" :id="`account-${row.id}`" :value="row.id" v-model="accounts">
        </template>
      </table-column>
      <table-column show="name" label="Name"></table-column>
      <table-column show="account_owner" label="Account Owner"></table-column>
      <table-column show="owner_document" label="Owner Document"></table-column>
      <table-column show="bank" label="Bank"></table-column>
      <table-column show="agency" label="Agency"></table-column>
      <table-column show="account_number" label="Account Nº"></table-column>
    </table-component>
    <button
      type="button"
      class="btn btn-outline-secondary"
      v-if="canAdd"
      data-toggle="modal"
      data-target="#account-modal"
    >Add Account</button>
    <add-account-modal v-if="canAdd"></add-account-modal>
  </div>
</template>

<script>
import { TableComponent, TableColumn } from "vue-table-component";
import AddAccountModal from "./Action/AddAccountModal";
import { mapState, mapActions } from "vuex";

export default {
  name: "bank-account-list",
  components: { AddAccountModal, TableComponent, TableColumn },
  props: {
    user: {
      type: Number,
      default: 1
    },
    canAdd: {
      type: Boolean,
      default: true
    }
  },
  computed: mapState("banks", {
    bank_accounts: state => state.accounts
  }),
  data: () => ({
    accounts: []
  }),
  methods: {
    ...mapActions("banks", ["load"])
  },
  created() {
    this.load();
  }
};
</script>
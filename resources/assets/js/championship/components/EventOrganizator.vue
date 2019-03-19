<template>
  <div>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link active show"
          data-toggle="tab"
          href="#organizations"
          role="tab"
          aria-controls="home"
          aria-selected="true"
        >
          <i class="icon-calculator"></i> Organizations
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active show" id="organizations" role="tabpanel">
        <table-component
          :data="this.organizators"
          table-class="table table-striped table-responsive-sm"
          filter-input-class="mb-md-2 form-control col-md-3 float-right"
          :show-caption="false"
        >
          <table-column show="id" label="#" :filterable="false" :sortable="false">
            <template slot-scope="row">
              <input
                type="checkbox"
                :id="`organization-${row.id}`"
                :value="row.id"
                v-model="selectedOrganizations"
              >
            </template>
          </table-column>
          <table-column show="name" label="Name"></table-column>
          <table-column show="contact" label="Contact"></table-column>
          <table-column show="address" label="Address"></table-column>
          <table-column show="email" label="E-mail"></table-column>
        </table-component>
        <button
          type="button"
          class="btn btn-outline-secondary"
          data-toggle="modal"
          data-target="#organizator-modal"
        >Add an Organizator</button>
        <add-organizator-modal></add-organizator-modal>

        <input
          type="hidden"
          name="organizations[]"
          v-for="organization in selectedOrganizations"
          :id="organization"
          :key="organization"
        >
      </div>
    </div>
  </div>
</template>

<script>
import { TableComponent, TableColumn } from "vue-table-component";
import AddOrganizatorModal from "./Organizator/AddOrganizatorModal";
import { mapState, mapActions } from "vuex";

export default {
  name: "event-organizator",
  components: { AddOrganizatorModal, TableComponent, TableColumn },
  data: () => ({
    selectedOrganizations: []
  }),
  computed: mapState("organizers", {
    organizators: state => state.organizers
  }),
  methods: {
    ...mapActions("organizers", ["load"])
  },
  created() {
    this.load();
  }
};
</script>
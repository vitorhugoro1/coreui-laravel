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
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
              <th scope="col">E-mail</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="organization in organizators" :key="organization.id">
              <th scope="row">#{{ organization.id }}</th>
              <td>{{ organization.name }}</td>
              <td>{{ organization.contact }}</td>
              <td>{{ organization.address }}</td>
              <td>{{ organization.email }}</td>
            </tr>
            <tr v-if="organizators.length === 0">
              <td colspan="5">Not organizations founded</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
              <th scope="col">E-mail</th>
            </tr>
          </tfoot>
        </table>
        <button
          type="button"
          class="btn btn-outline-secondary"
          data-toggle="modal"
          data-target="#organizator-modal"
        >Add an Organizator</button>
        <add-organizator-modal></add-organizator-modal>
      </div>
    </div>
  </div>
</template>

<script>
import AddOrganizatorModal from "./Organizator/AddOrganizatorModal";
import { mapState, mapActions } from "vuex";

export default {
  name: "event-organizator",
  components: { AddOrganizatorModal },
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
<template>
    <div>
      <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" v-if="$store.state.gender != 'false'">
              <a href="#male" class="nav-link active show" data-toggle="tab">Male</a>
          </li>
          <li class="nav-item" v-if="$store.state.gender != 'false'">
              <a href="#female" class="nav-link" data-toggle="tab">Female</a>
          </li>
          <li class="nav-item" v-if="$store.state.gender != 'true'">
              <a href="#common" class="nav-link active show" data-toggle="tab">Common</a>
          </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane show active" id="male" role="tabpanel" v-if="$store.state.gender != 'false'">
          <button type="button" class="pull-right my-2 btn btn-success">Add</button>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th><input type="checkbox"></th>
                      <th>Initial</th>
                      <th>Max</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="(male, key) in males" :key="key">
                    <td><input type="checkbox"></td>
                    <td>{{ male.initial }}</td>
                    <td>{{ male.max }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger">Remove</button>
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <div class="tab-pane" id="female" role="tabpanel" v-if="$store.state.gender != 'false'">
          <button type="button" class="pull-right my-2 btn btn-success">Add</button>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th><input type="checkbox"></th>
                      <th>Initial</th>
                      <th>Max</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="(female, key) in females" :key="key">
                    <td><input type="checkbox"></td>
                    <td>{{ female.initial }}</td>
                    <td>{{ female.max }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
              </tbody>
          </table>
        </div>
        <div class="tab-pane active show table-responsive" id="common" role="tabpanel" v-if="$store.state.gender != 'true'">
          <commons-controller></commons-controller>
        </div>
    </div>
    </div>
</template>

<script>
import CommonsController from "./Weights/Common/CommonsController";
import { mapState } from "vuex";

export default {
  name: "weights-creator-component",
  components: {
    CommonsController
  },
  computed: mapState("genders", ["females", "males"])
};
</script>
<template>
    <div>
      <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" v-if="gender != 'false'">
              <a href="#male" class="nav-link active show" data-toggle="tab">Male</a>
          </li>
          <li class="nav-item" v-if="gender != 'false'">
              <a href="#female" class="nav-link" data-toggle="tab">Female</a>
          </li>
          <li class="nav-item" v-if="gender != 'true'">
              <a href="#common" class="nav-link active show" data-toggle="tab">Common</a>
          </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane show active" id="male" role="tabpanel" v-if="gender != 'false'">
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
        <div class="tab-pane" id="female" role="tabpanel" v-if="gender != 'false'">
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
        <div class="tab-pane active show table-responsive" id="common" role="tabpanel" v-if="gender != 'true'">
          <commons-controller :commons="commons" @update="update" @remove="remove"></commons-controller>
        </div>
    </div>
    </div>
</template>

<script>
import CommonsController from "./Weights/Common/CommonsController";
import { findIndex, sortBy } from "lodash";

export default {
  name: "weights-creator-component",
  props: ["gender"],
  components: {
    CommonsController
  },
  data: () => ({
    males: [
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      }
    ],
    females: [
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      }
    ],
    commons: [
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      },
      {
        initial: 0,
        max: 10
      }
    ],
    miscs: []
  }),
  methods: {
    update(weight, type) {
      if (type == "common") {
        let hasInitial = findIndex(this.commons, { initial: weight.initial });
        let hasMax = findIndex(this.commons, { max: weight.max });

        if (hasInitial < 0 && hasMax < 0) {
          this.commons[weight.id] = {
            initial: weight.initial,
            max: weight.max
          };

          this.commons = sortBy(this.commons, ["initial"]);
        }

        if (hasInitial >= 0 || hasMax >= 0) {
          alert("ADICIONAR ALERTA");
        }
      }
    },
    remove(id, type) {
      if (type == "common") {
        if (this.commons.length > 1) {
          if (id === 0) {
            this.commons.shift();
          }

          if (id !== 0) {
            this.commons.splice(id, id);
          }
        }

        if (this.commons.length === 1) {
          this.commons = [];
        }
      }

      this.commons = sortBy(this.commons, ["initial"]);
    }
  }
};
</script>
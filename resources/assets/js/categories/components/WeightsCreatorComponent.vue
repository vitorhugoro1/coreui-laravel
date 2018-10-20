<template>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" v-if="!notHasGender">
                <a href="#male" class="nav-link active show" data-toggle="tab">Male</a>
            </li>
            <li class="nav-item" v-if="!notHasGender">
                <a href="#female" class="nav-link" data-toggle="tab">Female</a>
            </li>
            <li class="nav-item" v-if="notHasGender">
                <a href="#common" class="nav-link active show" data-toggle="tab">Common</a>
            </li>
        </ul>
        <div class="tab-content">
            <male-pane v-if="!notHasGender"></male-pane>
            <female-pane v-if="!notHasGender"></female-pane>
            <common-pane v-if="notHasGender"></common-pane>
        </div>
    </div>
</template>

<script>
  import CommonPane from "./Weights/Common/CommonPane";
  import {mapState} from "vuex";
  import MalePane from "./Weights/Gender/Male/MalePane.vue";
  import FemalePane from "./Weights/Gender/Female/FemalePane.vue";

  export default {
    name: "weights-creator-component",
    components: {
      FemalePane,
      MalePane,
      CommonPane
    },
    computed: {
      ...mapState(["genders/females/females", "genders/males/males"]),
      notHasGender() {
        return this.$store.state.gender !== 'true';
      }
    }
  };
</script>
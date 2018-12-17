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
      <male-pane v-if="!notHasGender" v-show="!isAged"></male-pane>
      <female-pane v-if="!notHasGender" v-show="!isAged"></female-pane>
      <common-pane v-if="notHasGender" v-show="!isAged"></common-pane>
      <ageing-pane v-if="!isAged" :not-has-gender="notHasGender"></ageing-pane>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import AgeingPane from "./Weights/Ageing/AgeingPane";
import CommonPane from "./Weights/Common/CommonPane";
import MalePane from "./Weights/Gender/Male/MalePane";
import FemalePane from "./Weights/Gender/Female/FemalePane";

export default {
  name: "weights-creator-component",
  components: {
    FemalePane,
    MalePane,
    CommonPane,
    AgeingPane
  },
  computed: {
    notHasGender() {
      return this.$store.state.gender !== "1";
    },
    isAged() {
      return this.$store.state.age_bracket === "1";
    }
  }
};
</script>
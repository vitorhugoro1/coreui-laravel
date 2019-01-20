<script>
import CommonPane from "./Common/CommonPane";
import MalePane from "./Gender/Male/MalePane";
import FemalePane from "./Gender/Female/FemalePane";

export default {
  name: "ageing-pane",
  components: {
    CommonPane,
    MalePane,
    FemalePane
  },
  computed: {
    hasGender() {
      return this.$store.state.gender === "1";
    }
  }
};
</script>
<template>
  <div>
    <male-pane v-show="hasGender"></male-pane>
    <female-pane v-show="hasGender"></female-pane>
    <common-pane v-show="!hasGender"></common-pane>
  </div>
</template>

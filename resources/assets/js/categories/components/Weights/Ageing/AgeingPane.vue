<script>
import CommonPane from "./Common/CommonPane";
import MalePane from "./Gender/Male/MalePane";
import FemalePane from "./Gender/Female/FemalePane";

export default {
  name: "ageing-pane",
  props: ["notHasGender"],
  components: {
    CommonPane,
    MalePane,
    FemalePane
  }
};
</script>
<template>
  <div>
    <male-pane v-show="!notHasGender"></male-pane>
    <female-pane v-show="!notHasGender"></female-pane>
    <common-pane v-show="notHasGender"></common-pane>
  </div>
</template>

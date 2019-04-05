<template>
  <div>
    <vue-ckeditor
      :id="id"
      :name="name"
      v-model="contentEditor"
      :readOnlyMode="readOnlyMode"
      :config="config"
    />
  </div>
</template>

<script>
import VueCkeditor from "vue-ckeditor2";

export default {
  name: "ckeditor",
  components: { VueCkeditor },
  props: ["content", "name", "id", "readOnlyMode"],
  data: () => ({
    contentEditor: "",
    config: {
      height: 300
    }
  }),
  created() {
    this.contentEditor = this.content;
  }
};
</script>
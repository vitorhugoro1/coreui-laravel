<template>
  <div>
    <autocomplete
      :url="url"
      param="query"
      :customParams="customParams"
      anchor="title"
      label="writer"
      :required="required"
      :onShouldGetData="getData"
      :classes="classes"
      :placeholder="placeholder"
      :id="fieldId"
      :min="3"
    ></autocomplete>
  </div>
</template>


<script>
import Autocomplete from "vue2-autocomplete-js";
import axios from "axios";

export default {
  name: "here-auto-complete",
  props: {
    classes: {
      type: Object,
      required: false,
      default: () => ({
        input: "form-control"
      })
    },
    required: {
      type: Boolean,
      required: false,
      default: false
    },
    placeholder: {
      type: String,
      required: false,
      default: ""
    },
    fieldId: {
      type: String,
      required: false,
      default: ""
    }
  },
  components: { Autocomplete },
  computed: {
    url: () => {
      return "http://autocomplete.geocoder.api.here.com/6.2/suggest.json";
    },
    app_id() {
      return process.env.MIX_HERE_APP_ID;
    },
    app_code() {
      return process.env.MIX_HERE_APP_CODE;
    },
    customParams() {
      return {
        app_id: this.app_id,
        app_code: this.app_code
      };
    }
  },
  methods: {
    async getData(value) {
      const response = await axios.get(this.url, {
        crossDomain: true,
        params: {
          app_id: this.app_id,
          app_code: this.app_code,
          query: value
        },
        withCredentials: true
      });

      return response.data.suggestions;
    }
  }
};
</script>
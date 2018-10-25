<template>
    <div>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a href="#pane" class="nav-link active show">Common</a>
        </li>
      </ul>
      <div class="tab-content">
        <forms-pane></forms-pane>
      </div>
    </div>
</template>

<script>
import FormsPane from './Forms/FormsPane';

export default {
  name: "forms-creator-component",
  components: {
    FormsPane
  },
  data: () => {
    return {
      forms: [
        {
          name: "Forma dahora",
          has_weapon: true,
          has_team: false
        }
      ]
    };
  }
};
</script>
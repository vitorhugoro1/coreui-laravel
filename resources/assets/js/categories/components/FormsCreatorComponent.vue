<template>
    <div class="col-lg-12">
      Forms Creator Component
    </div>
</template>

<script>
export default {
  name: "forms-creator-component",
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
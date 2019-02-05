<template>
  <div>
    <div class="form-group">
      <label for="all_day">All Day</label>
      <input type="checkbox" name="all_day" id="all_day">
    </div>
    <div class="form-group">
      <label for="period">Event Periods</label>
      <date-range id="period" name="period" :make-required="true"></date-range>
    </div>
    <div class="my-2">
      <h4>Recorrence</h4>
    </div>
    <div class="form-group">
      <v-select placeholder="Recorrence" :options="recorrence_rules"></v-select>
    </div>
  </div>
</template>

<script>
export default {
  name: "event-date-selector",
  data() {
    return {
      recorrence_rules: [
        {
          label: "Daily",
          value: "daily"
        },
        {
          label: "Weekly",
          value: "weekly"
        },
        {
          label: "Monthly",
          value: "monthly"
        },
        {
          label: "Yearly",
          value: "yearly"
        },
        {
          label: "Once",
          value: "once"
        }
      ]
    };
  }
};
</script>
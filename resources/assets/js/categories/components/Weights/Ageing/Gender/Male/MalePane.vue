<script>
export default {
  name: "male-pane",
  data: () => ({
    ageings: [
      {
        name: 'Junior',
        key: 'junior',
        data: [
          {
            min: 0,
            max: 10
          }
        ]
      }
    ]
  })
};
</script>

<template>
  <div class="tab-pane show active" id="male" role="tabpanel">
    <div class="accordion" id="malePaneAccordion">
      <div class="card" v-for="(ageing, key) in ageings" :key="key">
        <div class="card-header">
          <h5 class="mb-0">
            <a class="btn btn-link collapse" data-toggle="collapse" :data-target="`#${ageing.key}`">
              {{ ageing.name }}
            </a>
          </h5>
        </div>
        <div class="collapse" :id="ageing.key" data-parent="#malePaneAccordion">
          <div class="card card-body">
            <table class="table table-striped">
              <thead>
                <tr>#</tr>
                <tr>Initial</tr>
                <tr>Max</tr>
                <tr></tr>
              </thead>
              <tbody>
                <tr v-for="(value, id) in ageing.data" :key="id">
                  <td><input type="checkbox"></td>
                  <td>{{ value.min }}</td>
                  <td>{{ value.max }}</td>
                  <td>
                      <button type="button" class="btn btn-primary" @click="edit(id)" data-toggle="modal" :data-target="`#${ageing.key}-edit`">Edit</button>
                      <button type="button" class="btn btn-danger" @click="remove(id)">Remove</button>
                  </td>
                </tr>
                <tr v-if="ageing.data.length === 0">
                  <td colspan="4">
                    <span class="text-bold">Not weights added</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

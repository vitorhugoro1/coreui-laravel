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
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <a class="btn btn-link" data-toggle="collapse" data-target="#junior">
              Ageing Title
            </a>
          </h5>
        </div>
        <div class="collapse show" id="junior" data-parent="#malePaneAccordion">
          <div class="card card-body">
            <table class="table table-striped">
              <thead>
                <tr>#</tr>
                <tr>Initial</tr>
                <tr>Max</tr>
                <tr></tr>
              </thead>
              <tbody>
                <tr v-for="(junior, id) in juniors" :key="id">
                  <td><input type="checkbox"></td>
                  <td>{{ junior.min }}</td>
                  <td>{{ junior.max }}</td>
                  <td>
                      <button type="button" class="btn btn-primary" @click="edit(id)" data-toggle="modal" data-target="#junior-edit">Edit</button>
                      <button type="button" class="btn btn-danger" @click="remove(id)">Remove</button>
                  </td>
                </tr>
                <tr v-if="juniors.length === 0">
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

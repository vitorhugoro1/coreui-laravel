<script>
export default {
  name: "male-pane"
};
</script>

<template>
  <div class="tab-pane show active" id="male" role="tabpanel">
    <div class="accordion" id="malePaneAccordion">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <a class="btn btn-link" data-toggle="collapse" data-target="#junior">Ageing Title</a>
          </h5>
        </div>
        <div class="collapse show" id="junior" data-parent="#malePaneAccordion">
          <div class="card-body">tabela</div>
        </div>
      </div>
    </div>
  </div>
</template>

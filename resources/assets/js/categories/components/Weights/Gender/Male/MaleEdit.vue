<template>
    <div>
        <div class="modal fade" id="male-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Male</h4>
                        <button type="button" class="close" @click="close" data-dismiss="modal" aria-label="Cancel">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <div class="form-group">
                                <label for="initial">Initial</label>
                                <input type="text" class="form-control" id="initial"
                                       v-model.number="maleEdited.initial">
                            </div>
                            <div class="form-group">
                                <label for="max">Max</label>
                                <input type="text" class="form-control" id="max" v-model.number="maleEdited.max">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id='close-male-edit' class="btn btn-secondary" data-dismiss="modal"
                                @click="close">Cancel
                        </button>
                        <button type="button" class="btn btn-primary" @click="update(maleEdited, id)">Edit Male
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters} from 'vuex';

  export default {
    name: 'male-edit',
    computed: mapGetters("genders/males", {
      id: "getMaleEditingId",
      maleEdited: "getMaleEditing"
    }),
    methods: {
      update(male, id) {
        this.$store.dispatch('genders/males/updateMale', { id, male });

        if (!this.$store.state.genders.isErrorAction) {
            document.getElementById("close-male-edit").click();
        }
      },
      close() {
        this.$emit('close')
      }
    }
  }
</script>
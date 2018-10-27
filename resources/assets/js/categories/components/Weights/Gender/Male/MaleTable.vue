<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>Initial</th>
                <th>Max</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(male, key) in males" :key="key">
                <td><input type="checkbox"></td>
                <td>{{ male.min }}</td>
                <td>{{ male.max }}</td>
                <td>
                    <button type="button" class="btn btn-primary" @click="edit(key)" data-toggle="modal" data-target="#male-edit">Edit</button>
                    <button type="button" class="btn btn-danger" @click="remove(key)">Remove</button>
                </td>
            </tr>
            <tr v-if="males.length === 0">
              <td colspan="4">
                <span class="text-bold">Not weights added</span>
              </td>
            </tr>
            </tbody>
        </table>

        <male-edit v-show="isEditing" @close="close"></male-edit>
    </div>
</template>

<script>
  import {mapState} from 'vuex'
  import MaleEdit from './MaleEdit.vue'

  export default {
    name: 'male-table',
    components: {
      MaleEdit
    },
    data: () => ({
      isEditing: false
    }),
    computed: mapState('genders/males', [
      'males'
    ]),
    methods: {
      remove(key) {
        this.$store.dispatch('genders/males/removeMale', key);

        if (this.$store.state.genders.isErrorAction) {
          alert('COLOCAR UM ERRO!');
        }
      },
      edit(key) {
        this.$store.dispatch('genders/males/isMaleEditing', key);
        this.isEditing = true;
      },
      close() {
        this.$store.dispatch("genders/males/notMaleEditing");
        this.isEditing = false;
      }
    },
    created() {
      this.$store.dispatch('genders/males/getAllMales');
    }
  }
</script>
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
            <tr v-for="(female, key) in females" :key="key">
                <td><input type="checkbox"></td>
                <td>{{ female.initial }}</td>
                <td>{{ female.max }}</td>
                <td>
                    <button type="button" class="btn btn-primary" @click="edit(key)" data-toggle="modal" data-target="#female-edit">Edit</button>
                    <button type="button" class="btn btn-danger" @click="remove(key)">Remove</button>
                </td>
            </tr>
            <tr v-if="females.length === 0">
                <td colspan="4">
                <span class="text-bold">Not weights added</span>
                </td>
            </tr>
            </tbody>
        </table>

        <female-edit v-show="isEditing" @close="close"></female-edit>
    </div>
</template>

<script>
  import {mapState} from 'vuex';
  import FemaleEdit from './FemaleEdit';

  export default {
    name: 'female-table',
    components: {
        FemaleEdit
    },
    data: () => ({
        isEditing: false
    }),
    computed: mapState('genders/females', [
      'females'
    ]),
    methods: {
      remove(key) {
        this.$store.dispatch('genders/females/removeFemale', key);

        if (this.$store.state.genders.isErrorAction) {
          alert('COLOCAR UM ERRO!');
        }
      },
      edit(key) {
        this.$store.dispatch('genders/females/isFemaleEditing', key);
        this.isEditing = true;
      },
      close() {
        this.$store.dispatch("genders/females/notFemaleEditing");
        this.isEditing = false;
      }
    },
    created() {
      this.$store.dispatch('genders/females/getAllFemales');
    }
  }
</script>
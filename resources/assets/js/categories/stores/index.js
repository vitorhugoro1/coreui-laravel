import Vue from 'vue';
import Vuex from 'vuex';
import mutations from './mutations';
import common from './modules/common';
import genders from './modules/gender';
import forms from './modules/forms';
import ageing from './modules/ageing/index';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        type: 'forms',
        gender: '0',
        age_bracket: '0'
    },
    mutations,
    modules: {
        common,
        genders,
        forms,
        ageing
    }
});

export default store;
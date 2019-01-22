import males from './genders/males/index';
import females from "./genders/females/index";
import common from './common/index';

const state = {
    isErrorAction: false
};

const mutations = {
    setError(state, error) {
        state.isErrorAction = error;
    }
};

const getters = {};

const actions = {
    setError({
        commit,
        state
    }, error) {
        if (state.isErrorAction !== error) {
            commit('setError', error);
        }
    }
};

export default {
    namespaced: true,
    modules: {
        males,
        females,
        common
    },
    state,
    mutations,
    getters,
    actions
};
import {
    isValidWeight
} from "../../../../helpers/index";
import {
    orderBy,
    findIndex
} from 'lodash';

const malesInitial = [];

const state = {
    males: [],
    maleEditing: {
        min: 0,
        max: 0
    },
    maleEditingId: null,
};

const getters = {
    findMale: (state) => (id) => {
        return state.males.find((common, index) => index === id);
    },
    getMaleEditing: (state) => ({
        ...state.maleEditing
    }),
    getMaleEditingId: (state) => {
        let id = state.maleEditingId;
        return id;
    },
};

const mutations = {
    setMales(state, males) {
        state.males = males;
    },
    isMaleEditing(state, id) {
        state.maleEditing = {
            ...state.males[id]
        };
        state.maleEditingId = id;
    },
    notMaleEditing(state) {
        state.maleEditing = {
            min: 0,
            max: 0
        };
        state.maleEditingId = null;
    },
    addMale(state, male) {
        state.males.push(male);
        state.males = orderBy(state.males, ["min"]);
    },
    updateMale(state, {
        id,
        male
    }) {
        state.males[id] = {
            ...male
        };

        state.males = orderBy(state.males, ["min"]);
    },
    removeMale(state, id) {
        if (state.males.length === 1) {
            state.males = [];
        }

        if (state.males.length > 1) {
            if (id === 0) {
                state.males.shift();
            }

            if (id !== 0) {
                state.males.splice(id, id);
            }
        }

        if (state.males.length > 0) {
            state.males = orderBy(state.males, ["min"]);
        }
    }
};

const actions = {
    getAllMales({
        commit
    }) {
        window.axios.get('http://skigawk.test/admin/ageing').then((result) => {
            commit('setMales', result.data);
        });
    },
    removeMale({
        commit
    }, {id, target}) {
        commit('removeMale', {id, target});
    },
    isMaleEditing({
        commit
    }, {id, target}) {
        commit('isMaleEditing', {id, target});
    },
    notMaleEditing({
        commit
    }) {
        commit('notMaleEditing');
    },
    updateMale({
        commit,
        state,
        dispatch
    }, {
        id,
        target,
        male
    }) {
        let maleKey = findIndex(state.males, {
            key: target
        })

        let validate = isValidWeight(state.males[maleKey].data, male, id);

        if (validate) {
            commit('updateMale', {
                id,
                male
            });

            dispatch('genders/setError', false);
        }

        if (!validate) {
            dispatch('genders/setError', true);
        }
    },
    addMale({
        commit,
        state,
        dispatch
    }, male) {
        let validate = isValidWeight(state.males, male);

        if (validate) {
            commit('addMale', male);

            dispatch('genders/setError', false, {
                root: true
            });
        }

        if (!validate) {
            dispatch('genders/setError', true, {
                root: true
            });
        }
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
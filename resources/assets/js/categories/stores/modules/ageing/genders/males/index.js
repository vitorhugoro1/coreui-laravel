import {
    isValidWeight
} from "../../../../helpers/index";
import {
    orderBy,
    findIndex
} from 'lodash';

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
    isMaleEditing(state, {
        id,
        target
    }) {
        const key = findIndex(state.males, {
            key: target
        })

        state.maleEditing = {
            ...state.males[key].data[id]
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
    addMale(state, {
        male,
        target
    }) {
        const key = findIndex(state.males, {
            key: target
        })

        state.males[key].data.push(male);
        state.males[key].data = orderBy(state.males[key].data, ["min"]);
    },
    updateMale(state, {
        id,
        male,
        target
    }) {
        const key = findIndex(state.males, {
            key: target
        });

        state.males[key].data[id] = {
            ...male
        };

        state.males[key].data = orderBy(state.males[key].data, ["min"]);
    },
    removeMale(state, {
        id,
        target
    }) {
        const key = findIndex(state.males, {
            key: target
        })
        if (state.males.length === 1) {
            state.males[key].data = [];
        }

        if (state.males.length > 1) {
            if (id === 0) {
                state.males[key].data.shift();
            }

            if (id !== 0) {
                state.males[key].data.splice(id, id);
            }
        }

        if (state.males.length > 0) {
            state.males[key].data = orderBy(state.males[key].data, ["min"]);
        }
    }
};

const actions = {
    getAllMales({
        commit
    }) {
        window.axios.get(`admin/ageing`).then((result) => {
            commit('setMales', result.data);
        });
    },
    removeMale({
        commit
    }, {
        id,
        target
    }) {
        commit('removeMale', {
            id,
            target
        });
    },
    isMaleEditing({
        commit
    }, {
        id,
        target
    }) {
        commit('isMaleEditing', {
            id,
            target
        });
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
                male,
                target
            });

            dispatch('ageing/setError', false);
        }

        if (!validate) {
            dispatch('ageing/setError', true);
        }
    },
    addMale({
        commit,
        state,
        dispatch
    }, {
        male,
        target
    }) {
        let validate = isValidWeight(state.males, male);

        if (validate) {
            commit('addMale', {
                male,
                target
            });

            dispatch('ageing/setError', false, {
                root: true
            });
        }

        if (!validate) {
            dispatch('ageing/setError', true, {
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
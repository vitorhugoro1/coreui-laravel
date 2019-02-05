import {
    isValidWeight
} from "../../../../helpers/index";
import {
    orderBy,
    findIndex
} from 'lodash';

const state = {
    females: [],
    femaleEditing: {
        min: 0,
        max: 0
    },
    femaleEditingId: null,
};

const getters = {
    findFemale: (state) => (id) => {
        return state.females.find((common, index) => index === id);
    },
    getFemaleEditing: (state) => ({
        ...state.femaleEditing
    }),
    getFemaleEditingId: (state) => {
        let id = state.femaleEditingId;
        return id;
    },
};

const mutations = {
    setFemales(state, females) {
        state.females = females;
    },
    isFemaleEditing(state, {
        id,
        target
    }) {
        const key = findIndex(state.females, {
            key: target
        })

        state.femaleEditing = {
            ...state.females[key].data[id]
        };
        state.femaleEditingId = id;
    },
    notFemaleEditing(state) {
        state.femaleEditing = {
            min: 0,
            max: 0
        };
        state.femaleEditingId = null;
    },
    addFemale(state, {
        female,
        target
    }) {
        const key = findIndex(state.females, {
            key: target
        })

        state.females[key].data.push(female);
        state.females[key].data = orderBy(state.females[key].data, ["min"]);
    },
    updateFemale(state, {
        id,
        female,
        target
    }) {
        const key = findIndex(state.females, {
            key: target
        });

        state.females[key].data[id] = {
            ...female
        };

        state.females[key].data = orderBy(state.females[key].data, ["min"]);
    },
    removeFemale(state, {
        id,
        target
    }) {
        const key = findIndex(state.females, {
            key: target
        })
        if (state.females.length === 1) {
            state.females[key].data = [];
        }

        if (state.females.length > 1) {
            if (id === 0) {
                state.females[key].data.shift();
            }

            if (id !== 0) {
                state.females[key].data.splice(id, id);
            }
        }

        if (state.females.length > 0) {
            state.females[key].data = orderBy(state.females[key].data, ["min"]);
        }
    }
};

const actions = {
    getAllFemales({
        commit
    }) {
        window.axios.get(`admin/ageing`).then((result) => {
            commit('setFemales', result.data);
        });
    },
    removeFemale({
        commit
    }, {
        id,
        target
    }) {
        commit('removeFemale', {
            id,
            target
        });
    },
    isFemaleEditing({
        commit
    }, {
        id,
        target
    }) {
        commit('isFemaleEditing', {
            id,
            target
        });
    },
    notFemaleEditing({
        commit
    }) {
        commit('notFemaleEditing');
    },
    updateFemale({
        commit,
        state,
        dispatch
    }, {
        id,
        target,
        female
    }) {
        let femaleKey = findIndex(state.females, {
            key: target
        })

        let validate = isValidWeight(state.females[femaleKey].data, female, id);

        if (validate) {
            commit('updateFemale', {
                id,
                female,
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
    },
    addFemale({
        commit,
        state,
        dispatch
    }, {
        female,
        target
    }) {
        let validate = isValidWeight(state.females, female);

        if (validate) {
            commit('addFemale', {
                female,
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
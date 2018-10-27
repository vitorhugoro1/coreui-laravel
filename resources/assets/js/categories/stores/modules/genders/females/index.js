import {
    isValidWeight
} from "../../../helpers/index";
import {
    orderBy
} from 'lodash';

const femalesInitial = [{
        min: 0,
        max: 19
    },
    {
        min: 20,
        max: 29
    }
];

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
    isFemaleEditing(state, id) {
        state.femaleEditing = {
            ...state.females[id]
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
    addFemale(state, female) {
        state.females.push(female);
        state.females = orderBy(state.females, ["min"]);
    },
    updateFemale(state, {
        id,
        female
    }) {
        state.females[id] = {
            ...female
        };

        state.females = orderBy(state.females, ["min"]);
    },
    removeFemale(state, id) {
        if (state.females.length === 1) {
            state.females = [];
        }

        if (state.females.length > 1) {
            if (id === 0) {
                state.females.shift();
            }

            if (id !== 0) {
                state.females.splice(id, id);
            }
        }

        if (state.females.length > 0) {
            state.females = orderBy(state.females, ["min"]);
        }
    }
};

const actions = {
    getAllFemales({
        commit
    }) {
        commit('setFemales', femalesInitial);
    },
    removeFemale({
        commit
    }, id) {
        commit('removeFemale', id);
    },
    isFemaleEditing({
        commit
    }, id) {
        console.log(id);
        commit('isFemaleEditing', id);
    },
    notFemaleEditing({
        commit
    }) {
        commit('notFemaleEditing');
    },
    updateFemale({
        commit, dispatch, state
    }, {
        id,
        female
    }) {
        let validate = isValidWeight(state.females, female, id);

        if (validate) {
            commit('updateFemale', {
                id,
                female
            });

            dispatch('genders/setError', false);
        }

        if (!validate) {
            dispatch('genders/setError', true);
        }
    },
    addFemale({
        commit, state, dispatch
    }, female) {
        let validate = isValidWeight(state.females, female);

        if (validate) {
            commit('addFemale', female);

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
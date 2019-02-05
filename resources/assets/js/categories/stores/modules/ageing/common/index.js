import {
    isValidWeight
} from "../../../helpers/index";
import {
    orderBy,
    findIndex
} from 'lodash';

const state = {
    commons: [],
    commonEditing: {
        min: 0,
        max: 0
    },
    commonEditingId: null,
    isErrorAction: false
};

const getters = {
    find: (state) => (id) => {
        return state.commons.find((common, index) => index === id);
    },
    getEditing: (state) => ({
        ...state.commonEditing
    }),
    getEditingId: (state) => {
        let id = state.commonEditingId;
        return id;
    },
};

const mutations = {
    setCommons(state, commons) {
        state.commons = commons;
    },
    isCommonEditing(state, {
        id,
        target
    }) {
        const key = findIndex(state.commons, {
            key: target
        })

        state.commonEditing = {
            ...state.commons[key].data[id]
        };
        state.commonEditingId = id;
    },
    notCommonEditing(state) {
        state.commonEditing = {
            min: 0,
            max: 0
        };
        state.commonEditingId = null;
    },
    addCommon(state, {
        common,
        target
    }) {
        const key = findIndex(state.commons, {
            key: target
        })

        state.commons[key].data.push(common);
        state.commons[key].data = orderBy(state.commons[key].data, ["min"]);
    },
    updateCommon(state, {
        id,
        common,
        target
    }) {
        const key = findIndex(state.commons, {
            key: target
        });

        state.commons[key].data[id] = {
            ...common
        };

        state.commons[key].data = orderBy(state.commons[key].data, ["min"]);
    },
    removeCommon(state, {
        id,
        target
    }) {
        const key = findIndex(state.commons, {
            key: target
        })
        if (state.commons.length === 1) {
            state.commons[key].data = [];
        }

        if (state.commons.length > 1) {
            if (id === 0) {
                state.commons[key].data.shift();
            }

            if (id !== 0) {
                state.commons[key].data.splice(id, id);
            }
        }

        if (state.commons.length > 0) {
            state.commons[key].data = orderBy(state.commons[key].data, ["min"]);
        }
    }
};

const actions = {
    getAllCommons({
        commit
    }) {
        window.axios.get(`admin/ageing`).then((result) => {
            commit('setCommons', result.data);
        });
    },
    removeCommon({
        commit
    }, {
        id,
        target
    }) {
        commit('removeCommon', {
            id,
            target
        });
    },
    isCommonEditing({
        commit
    }, {
        id,
        target
    }) {
        commit('isCommonEditing', {
            id,
            target
        });
    },
    notCommonEditing({
        commit
    }) {
        commit('notCommonEditing');
    },
    updateCommon({
        commit,
        state,
        dispatch
    }, {
        id,
        target,
        common
    }) {
        let commonKey = findIndex(state.commons, {
            key: target
        })

        let validate = isValidWeight(state.commons[commonKey].data, common, id);

        if (validate) {
            commit('updateCommon', {
                id,
                common,
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
    addCommon({
        commit,
        state,
        dispatch
    }, {
        common,
        target
    }) {
        let validate = isValidWeight(state.commons, common);

        if (validate) {
            commit('addCommon', {
                common,
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
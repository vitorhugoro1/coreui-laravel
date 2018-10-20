import {
  orderBy
} from 'lodash';
import {isValidWeight} from "../helpers/index";

const commonsInitial = [{
  initial: 0,
  max: 10
},
  {
    initial: 0,
    max: 10
  },
  {
    initial: 0,
    max: 10
  },
  {
    initial: 0,
    max: 10
  },
  {
    initial: 0,
    max: 12
  }
];

const state = {
  commons: [],
  commonEditing: {
    initial: 0,
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
    const id = state.commonEditingId;
    return id;
  },
};

const actions = {
  getAllCommons({
                  commit
                }) {
    commit('setCommons', commonsInitial);
  },
  removeCommon({
                 commit
               }, id) {
    commit('removeCommon', id);
  },
  isCommonEditing({
                    commit
                  }, id) {
    commit('isCommonEditing', id);
  },
  notCommonEditing({
                     commit
                   }) {
    commit('notCommonEditing');
  },
  updateCommon({
                 commit
               }, {
                 id,
                 common
               }) {
    commit('updateCommon', {
      id,
      common
    });
  },
  addCommon({
              commit
            }, common) {
    commit('addCommon', common);
  }
};

const mutations = {
  isCommonEditing(state, id) {
    state.commonEditing = state.commons[id];
    state.commonEditingId = id;
  },
  notCommonEditing(state) {
    state.commonEditing = {
      initial: 0,
      max: 0
    };
    state.commonEditingId = null;
  },
  setCommons(state, commons) {
    state.commons = commons;
  },
  addCommon(state, common) {
    let validate = isValidWeight(state.commons, common);

    if (validate) {
      state.commons.push(common);

      state.commons = orderBy(state.commons, ["initial"]);
      state.isErrorAction = false;
    }

    if (!validate) {
      state.isErrorAction = true;
      alert("ADICIONAR ALERTA");
    }
  },
  updateCommon(state, {
    id,
    common
  }) {
    let validate = isValidWeight(state.commons, common, id);

    if (validate) {
      state.commons[id] = {
        ...common
      };

      state.commons = orderBy(state.commons, ["initial"]);
      state.isErrorAction = false;
    }

    if (!validate) {
      state.isErrorAction = true;
      alert("ADICIONAR ALERTA");
    }
  },
  removeCommon(state, id) {
    if (state.commons.length === 1) {
      state.commons = [];
    }

    if (state.commons.length > 1) {
      if (id === 0) {
        state.commons.shift();
      }

      if (id !== 0) {
        state.commons.splice(id, id);
      }
    }

    if (state.commons.length > 0) {
      state.commons = orderBy(state.commons, ["initial"]);
    }
  }
};

export default {
  namespaced: true,
  state,
  mutations,
  actions,
  getters
};
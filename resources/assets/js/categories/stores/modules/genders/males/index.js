import {
  isValidWeight
} from "../../../helpers/index";
import {
  orderBy
} from 'lodash';

const malesInitial = [{
    min: 0,
    max: 19
  },
  {
    min: 20,
    max: 29
  }
];

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
    state.maleEditing = { ...state.males[id]
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
    commit('setMales', malesInitial);
  },
  removeMale({
    commit
  }, id) {
    commit('removeMale', id);
  },
  isMaleEditing({
    commit
  }, id) {
    commit('isMaleEditing', id);
  },
  notMaleEditing({
    commit
  }) {
    commit('notMaleEditing');
  },
  updateMale({
    commit, state, dispatch
  }, {
    id,
    male
  }) {
    let validate = isValidWeight(state.males, male, id);

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
    commit, state, dispatch
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
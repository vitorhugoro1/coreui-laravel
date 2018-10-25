import {
    orderBy
} from 'lodash';
import {
    isValidWeight
} from "../helpers/index";

const formsInitial = [
    {
        name: 'Tradicional Forma sincronizada armas',
        weapon: true,
        team: true
    },
    {
        name: 'Tradicional Forma sincronizada mãos',
        weapon: false,
        team: true
    },
    {
        name: 'Tradicional Mãos Norte',
        weapon: false,
        team: false
    },
    {
        name: 'Tradicional Toi Tcha de armas',
        weapon: true,
        team: false
    }
];

const state = {
    forms: [],
    formEditing: {
        name: '',
        weapon: false,
        team: false
    },
    formEditingId: null,
    isErrorAction: false
};

const getters = {
    find: (state) => (id) => {
        return state.forms.find((common, index) => index === id);
    },
    getEditing: (state) => ({
        ...state.formEditing
    }),
    getEditingId: (state) => {
        const id = state.formEditingId;
        return id;
    }
};

const actions = {
    getAllForms({
        commit
    }) {
        commit('setForms', formsInitial);
    },
    removeForm({
        commit
    }, id) {
        commit('removeForm', id);
    },
    isFormEditing({
        commit
    }, id) {
        commit('isFormEditing', id);
    },
    notFormEditing({
        commit
    }) {
        commit('notFormEditing');
    },
    updateForm({
        commit
    }, {
        id,
        form
    }) {
        commit('updateForm', {
            id,
            form
        });
    },
    addForm({
        commit
    }, form) {
        commit('addForm', form);
    }
};

const mutations = {
    isFormEditing(state, id) {
        state.formEditing = state.forms[id];
        state.formEditingId = id;
    },
    notFormsEditing(state) {
        state.formEditing = {
            name: ''
        };
        state.formEditingId = null;
    },
    setForms(state, forms) {
        state.forms = forms;
    },
    addForm(state, form) {
        let validate = isValidWeight(state.form, form);

        if (validate) {
            state.forms.push(form);

            state.forms = orderBy(state.forms, ["initial"]);
            state.isErrorAction = false;
        }

        if (!validate) {
            state.isErrorAction = true;
            alert("ADICIONAR ALERTA");
        }
    },
    updateForm(state, {
        id,
        form
    }) {
        let validate = isValidWeight(state.forms, form, id);

        if (validate) {
            state.forms[id] = {
                ...form
            };

            state.forms = orderBy(state.forms, ["initial"]);
            state.isErrorAction = false;
        }

        if (!validate) {
            state.isErrorAction = true;
            alert("ADICIONAR ALERTA");
        }
    },
    removeForm(state, id) {
        if (state.forms.length === 1) {
            state.forms = [];
        }

        if (state.forms.length > 1) {
            if (id === 0) {
                state.forms.shift();
            }

            if (id !== 0) {
                state.forms.splice(id, id);
            }
        }

        if (state.forms.length > 0) {
            state.forms = orderBy(state.forms, ["initial"]);
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
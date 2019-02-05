import {
    findIndex
} from 'lodash';

export default {
    namespaced: true,
    state: {
        organizers: []
    },
    mutations: {
        remove(state, id) {
            const key = findIndex(state.organizers, {
                id
            })

            if (state.organizers.length === 1) {
                state.organizers = [];
            }

            if (state.organizers.length > 1) {
                if (organizers === 0) {
                    state.organizers.shift();
                }

                if (organizers !== 0) {
                    state.organizers.splice(key, key);
                }
            }
        },
        setOrganizers(state, payload) {
            state.organizers = payload
        }
    },
    actions: {
        load({
            commit
        }) {
            window.axios.get('admin/user/organizers').then(response => {
                commit('setOrganizers', response.data)
            })
        },
        add({
            dispatch
        }, organization) {
            window.axios.post('admin/user/organizers', {
                ...organization
            }).then(response => {
                if (response.data.status === 'success') {
                    dispatch('load')
                }
            })
        }
    }
}
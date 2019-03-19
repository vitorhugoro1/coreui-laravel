import findIndex from "lodash/findIndex"

export default {
    namespaced: true,
    state: {
        organizers: [],
        errorApi: false
    },
    mutations: {
        remove(state, id) {
            const key = findIndex(state.organizers, {
                id
            })

            if (state.organizers.length === 1) {
                state.organizers = []
            }

            if (state.organizers.length > 1) {
                if (organizers === 0) {
                    state.organizers.shift()
                }

                if (organizers !== 0) {
                    state.organizers.splice(key, key)
                }
            }
        },
        setOrganizers(state, payload) {
            state.organizers = payload
        },
        add(state, payload) {
            state.organizers.push(payload)
        }
    },
    actions: {
        load({
            commit
        }) {
            window.axios.get("admin/user/organizers").then(response => {
                commit("setOrganizers", response.data)
            })
        },
        add({
            commit
        }, organization) {
            window.axios.post("admin/user/organizers", {
                ...organization
            }).then(response => {
                if (response.data.status === "success") {
                    commit("add", response.data.data)
                }

                if (response.data.status === "error") {
                    alert(response.data.message)

                }
            })
        }
    }
}
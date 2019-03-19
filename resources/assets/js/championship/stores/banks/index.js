import findIndex from "lodash/findIndex"

export default {
    namespaced: true,
    state: {
        accounts: [],
        errorApi: false
    },
    mutations: {
        add(state, payload) {
            state.accounts.push(payload)
        },
        remove(state, id) {
            const key = findIndex(state.accounts, {
                id
            })

            if (state.accounts.length === 1) {
                state.accounts = []
            }

            if (state.accounts.length > 1) {
                if (accounts === 0) {
                    state.accounts.shift()
                }

                if (accounts !== 0) {
                    state.accounts.splice(key, key)
                }
            }
        },
        set(state, payload) {
            state.accounts = payload
        }
    },
    actions: {
        load({
            commit
        }) {
            window.axios.get("admin/user/bank-accounts")
                .then(response => {
                    commit("set", response.data)
                })
        },
        add({
            commit
        }, account) {
            window.axios.post("admin/user/bank-accounts", {
                ...account
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
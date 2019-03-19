import Vue from "vue"
import Vuex from "vuex"
import organizers from "./organizers"
import banks from "./banks"

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        organizations: [],
        bankAccounts: []
    },
    modules: {
        organizers,
        banks
    }
})
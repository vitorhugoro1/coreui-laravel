import Vue from "vue"
import Vuex from "vuex"
import organizers from "./organizers"

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        organizers
    }
})
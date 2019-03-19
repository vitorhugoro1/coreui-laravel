/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("../bootstrap")

window.Vue = require("vue")

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("ckeditor", require("../components/ckeditor.vue"))
Vue.component("here-auto-complete", require("../components/HereAutoComplete.vue"))
Vue.component("date-range", require("./components/DateRange.vue"))
Vue.component("event-ticket-selector", require("./components/EventTicketSelector.vue"))
Vue.component("event-date-selector", require("./components/EventDateSelector.vue"))
Vue.component("event-organizator", require("./components/EventOrganizator.vue"))

import {
    TableComponent,
    TableColumn
} from "vue-table-component"
import vSelect from "vue-select"
import store from "./stores"

Vue.component("v-select", vSelect)
Vue.component("table-component", TableComponent)
Vue.component("table-column", TableColumn)


const app = new Vue({
    el: "#app",
    store,
    data() {
        return {
            money: {
                decimal: ",",
                thousands: ".",
                prefix: "",
                suffix: "",
                precision: 2,
            },
            modalitiesModel: [],
            fight_level: [],
            age_bracket: []
        }
    }
})
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import {
    TableComponent,
    TableColumn
} from 'vue-table-component';
import vSelect from 'vue-select';
import FormsCreatorComponent from './components/FormsCreatorComponent';
import WeightsCreatorComponent from './components/WeightsCreatorComponent';

Vue.component('v-select', vSelect);
Vue.component('table-component', TableComponent);
Vue.component('table-column', TableColumn);
Vue.component('forms-creator-component', FormsCreatorComponent);
Vue.component('weights-creator-component', WeightsCreatorComponent);

const app = new Vue({
    el: '#app',
    data: () => {
        return {
            type: ''
        };
    }
});
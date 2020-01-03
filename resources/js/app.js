/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import vSelect from 'vue-select';
import axios from "axios";
import moment from 'moment';

import { library } from '@fortawesome/fontawesome-svg-core';
import { faWindowMinimize, faTimes, faEdit, faUser, faCar } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import 'vue-select/dist/vue-select.css';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

library.add(faWindowMinimize, faTimes, faEdit, faUser, faCar);

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('v-select', vSelect);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use({
    install (Vue) {
        Vue.prototype.$api = axios.create();
    }
});

moment.locale('nl');
Vue.prototype.$moment = moment;

import App from  './components/App';
import CAD from './components/CAD';

const router = new VueRouter({
    mode: 'history',
    base: '/fms',
    routes: [
        {
            path: '/cad',
            name: 'cad',
            component: CAD
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    render: (h) => h(App)
});

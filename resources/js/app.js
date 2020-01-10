/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import VueSpinners from 'vue-spinners';
import axios from "axios";
import moment from 'moment';

import { library } from '@fortawesome/fontawesome-svg-core';
import { faWindowMinimize, faTimes, faEdit, faUser, faCar } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

library.add(faWindowMinimize, faTimes, faEdit, faUser, faCar);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VueSpinners);
Vue.use({
    install (Vue) {
        Vue.prototype.$api = axios.create();
    }
});

moment.locale('nl');
Vue.prototype.$moment = moment;

Vue.prototype.log = console.log;

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

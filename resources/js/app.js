require('./bootstrap');

var Turbolinks = require("turbolinks")
Turbolinks.start()

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import 'livewire-vue';

window.Vue = Vue;

/* Shop */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
const app = new Vue({
    el: '#app',
    router
});
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import 'livewire-vue';

window.Vue = Vue;

/* Shop */
Vue.component('shop-home', require('./components/shop/index.vue'));
Vue.component('shop-cart', require('./components/shop/cart.vue'));
Vue.component('shop-alerts', require('./components/shop/alerts.vue'));
Vue.component('shop-profile', require('./components/shop/profile.vue'));

var Turbolinks = require('turbolinks');
Turbolinks.start();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
const app = new Vue({
    el: '#app',
    router
});
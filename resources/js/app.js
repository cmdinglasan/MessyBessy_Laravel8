require('./bootstrap');

import Vue from 'vue'
import 'livewire-vue'

window.Vue = Vue;

Vue.component('transaction-home', require('component/transaction/index.vue') default);
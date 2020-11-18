import Vue from 'vue';
import VueRouter from 'vue-router';
import 'livewire-vue';

Vue.use(VueRouter);

let router = new VueRouter({
	base: '/',
	fallback: true,
	routes: [
	    { },
	]
});

export default router;
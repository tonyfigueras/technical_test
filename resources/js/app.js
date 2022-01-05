require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import Vuetify from 'vuetify';
import "vuetify/dist/vuetify.min.css";
import Vue           from 'vue'
import Notifications from 'vue-notification'
import Swal from 'sweetalert2';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
Vue.use(Toast, {
    transition: "Vue-Toastification__bounce",
    maxToasts: 20,
    newestOnTop: true
  });
Vue.use(Notifications)
Vue.use(Vuetify);



Vue.use(VueRouter)

let routes = [
	{ path: '/dashboard', component: require('./components/Dashboard.vue').default },
	{ path: '/user', component: require('./components/User/template.vue').default }
]

const router = new VueRouter({
	mode: 'history',
	routes,
	linkActiveClass: 'active',
	linkExactActiveClass: "exact-active",
})

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify()
});
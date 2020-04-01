require('./bootstrap');

const url = 'http://localhost:8000';
window.Vue = require('vue');
import axios from 'axios';
import  BootstrapVue  from 'bootstrap-vue';
import Application from './views/Application';
import {routes} from './routes';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

// Install BootstrapVue
Vue.use(BootstrapVue)
Vue.use(url);


Vue.component('nav-com', require('./components/Nav.vue').default);
Vue.component('side-bar', require('./components/Sidebar.vue').default);
Vue.use(axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
});



const application = new Vue({
    el: '#application',
    router: router,
    render: h => h(Application),
});


require('./bootstrap');

const url = 'http://localhost:8000';
window.Vue = require('vue');
import axios from 'axios';
import  BootstrapVue  from 'bootstrap-vue';
import Application from './views/Application';
import {router} from './routes';
import VueRouter from 'vue-router';
import VueGlobalVar from 'vue-global-var';
import NProgress from 'nprogress';
Vue.use(VueRouter)
Vue.use(axios);
Vue.use(BootstrapVue)
Vue.use(url);
Vue.use(require('vue-moment'));
Vue.use(NProgress);
// Vue.use(VueGlobalVar, {
//     globals: {
//       $user: username(),
//     },
//   });

Vue.component('nav-com', require('./components/Nav.vue').default);
Vue.component('side-bar', require('./components/Sidebar.vue').default);



const app = new Vue({
    el: '#app',
    router: router,
});



const application = new Vue({
    el: '#application',
    router: router,
    render: h => h(Application),
    VueGlobalVar,
});


// function username() {
//     axios.get('http://localhost:8000/api/getUser')
//                 .then(response => {
//                     globalThis:{
//                         $user: response.data.user
//                     } ;
//                 });
// }

// function test(params) {
//     console.log(globalThis.$user);
// }
// test();

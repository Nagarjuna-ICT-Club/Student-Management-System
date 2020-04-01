require('./bootstrap');


import axios from 'axios';

window.Vue = require('vue');
const url = 'http://localhost:800';



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-com', require('./components/Nav.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(axios);
const app = new Vue({
    el: '#app',
});

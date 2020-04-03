import VueRouter from 'vue-router';
import CreateApp from './views/CreateApp.vue';
import AllApp from './views/AllApp.vue';

// import AddBook from './views/AddBook.vue';
// import EditBook from './views/EditBook.vue';
// import Login from './views/Login.vue';


export const router = new VueRouter({
    mode: 'history',
    routes : [
    {
        name: 'home_app',
        path: '/application/home',
        component: AllApp
    },
    {
        name: 'home_app',
        path: '/application/',
        component: AllApp
    },
    {
        name: 'add_app',
        path: '/application/add_app',
        component: CreateApp
    }

]});

router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.
        NProgress.start()
    }
    next()
  })

  router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
   NProgress.done()
  })


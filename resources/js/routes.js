import VueRouter from 'vue-router';
import CreateApp from './views/CreateApp.vue';
import AllApp from './views/AllApp.vue';
import Message from './views/Message/Message.vue';
import Profile from './views/Profile/Profile.vue';
import EditProfile from './views/Profile/EditProfile.vue';
import EditApp from './views/EditApp.vue';
import Setting from './views/Setting/Setting.vue';
import ChangePwd from './views/Setting/ChangePwd.vue';
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
    },
    {
        name: 'EditApplication',
        path: '/application/edit/:app_id',
        component: EditApp
    },
    {
        name: 'messages',
        path: '/messages/home',
        component: Message
    },
    {
        name: 'profile',
        path: '/profile',
        component: Profile
    },
    {
        name: 'profileUpdate',
        path: '/profile/update/:user_id/:user_name',
        component: EditProfile
    },
    {
        name: 'Settings',
        path: '/settings/home',
        component: Setting
    },
    {
        name: 'ChangePwd',
        path: '/settings/ChangePwd',
        component: ChangePwd
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


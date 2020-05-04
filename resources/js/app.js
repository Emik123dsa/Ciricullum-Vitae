require('./bootstrap');
/**
 * We have to determine Vue with initial 
 */
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
import App from './App.vue';

import VueMeta from 'vue-meta';
Vue.use(VueMeta);

import store from './store/index';

import routes from './routes/routes';
var VueCookie = require('vue-cookie');

Vue.use(VueCookie); 

import VueBreadcrumbs from 'vue-breadcrumbs';
Vue.use(VueBreadcrumbs);

import './global/semantic-ui-vue';
import './global/vue-particles'; 

import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

const router = new VueRouter(
    {
        mode: 'history',
        routes: routes
    }
);


router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start();
    }
    next();
});

router.afterEach((to, from) => NProgress.done());

const app = new Vue({
    store,
    router, 
    render: (h) => h(App)
}).$mount("#app");
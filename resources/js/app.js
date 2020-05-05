//require('./bootstrap');
/**
 * We have to determine Vue with initial 
 */

/**
 * Vue
 */
import Vue from 'vue';

/**
 * VueRouter
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);


/**
 * VueAxios
 */
import VueAxios from 'vue-axios';
import axios from 'axios';
//axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(VueAxios, axios);

/**
 * App implemented component
 */
import App from './App.vue';

/**
 * VueMeta
 */
import VueMeta from 'vue-meta';
Vue.use(VueMeta);

/**
 * VueX
 */
import store from './store/index';

/**
 * Routes for VueRouter
 */
import routes from './routes/routes';

/**
 * VueCookie
 */
import VueCookie from 'vue-cookie';
Vue.use(VueCookie);

/**
 * VueBreadcrumb
 */
import VueBreadcrumbs from 'vue-breadcrumbs';
Vue.use(VueBreadcrumbs);

/**
 * Global plugins
 */
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

export default new Vue({
    store,
    router,
    render: (h) => h(App)
})
/**
 * Vue
 */
import Vue from 'vue';
/**
 * VueAxios
 */
import VueAxios from 'vue-axios';
import axios from 'axios';
//axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.use(VueAxios, axios);
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

import { createStore } from './store/index';
import { createRouter } from './routes/routes';
import { sync } from 'vuex-router-sync';

import App from './App.vue';

export function createApp() {
    const router = createRouter();
    const store = createStore();

    sync(store, router);

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
    }
    )
    return { app, router, store };
};
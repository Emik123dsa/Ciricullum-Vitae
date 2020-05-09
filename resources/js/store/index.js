import Vue from 'vue';

import Vuex from 'vuex';
import features from './modules/features';

Vue.use(Vuex);

export function createStore() { 
    return new Vuex.Store({
    modules: {
        features
    }
})
}; 
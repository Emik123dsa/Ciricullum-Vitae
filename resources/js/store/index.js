import Vue from 'vue';

import Vuex from 'vuex';
import features from './modules/features';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        features
    }
}); 
import Vue from 'vue';
import Vuex from 'vuex';

import notificacoes from './modules/notificacoes'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        notificacoes,
    }
})
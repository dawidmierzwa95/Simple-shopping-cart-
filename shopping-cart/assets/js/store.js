import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loaded: false
    },
    mutations:
        {
            ['CONTENT_LOADED'](state) {
                state.loaded = true;
            },
        },
    actions: {
        contentHasBeenLoaded ({commit}) {
            commit('CONTENT_LOADED');
        },
    },
    getters: {
        isLoaded: state => {
            return state.loaded
        },
    }
})

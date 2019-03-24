import Vue from 'vue';
import Vuex from 'vuex';
import App from './modules/App';

import router from './router';
import store from './store';

new Vue({
    router,
    store,
    el: '#_app',
    template: '<App/>',
    components: { App },
    watch: {},
    methods: {},
    created(){}
});


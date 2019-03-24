import Vue from 'vue'
import Router from 'vue-router'

import ProductsList from './modules/ProductsList'
import ProductPage from './modules/ProductPage'

Vue.use(Router);

let router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'ProductsList',
            component: ProductsList,
        },
        {
            path: '/product/:slug',
            name: 'ProductPage',
            component: ProductPage,
        }
    ]
});

router.beforeEach((to, from, next) =>
{
    next();
});

export default router;
require('./bootstrap');

window.Vue = require('vue');


// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import vuetify from './vuetify';
import 'es6-promise/auto';
import VueAuth from '@websanova/vue-auth';
import auth from './auth';



// import file yang dibuat tadi
import App from './containers/Apps/App.vue';
import Items from './containers/Items/Item.vue';
import ItemsCreate from './containers/Items/Create.vue';
import ItemsUpdate from './containers/Items/Update.vue';
import Products from './containers/Products/Products.vue';
import ProductsCreate from './containers/Products/Create.vue';
import ProductsUpdate from './containers/Products/Update.vue';
import Dashboard from './containers/Dashboard/Index.vue';
import Transaction from './containers/Transactions/Transaction.vue';
import ProductRecipes from './containers/ProductRecipes/ProductRecipes.vue';
import ProductRecipesCreate from './containers/ProductRecipes/Create.vue';
import InventoryIn from './containers/Inventory/InventoryIn.vue';
import InventoryOut from './containers/Inventory/InventoryOut.vue';
import Login from './containers/Login/Login.vue';
import Report from './containers/Report/Report.vue';

axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;

Vue.use(VueRouter, VueAxios, axios, VueAuth, auth);

// membuat router

const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard,
        meta: {
            auth: undefined
        }
    },
    {
        name: 'items',
        path: '/items',
        component: Items,
        meta: {
            auth: false
        }
    },
    {
        name: 'items-create',
        path: '/items/create',
        component: ItemsCreate,
        meta: {
            auth: false
        }
    },
    {
        name: 'items-update',
        path: '/items/:id',
        component: ItemsUpdate,
        meta: {
            auth: false
        }
    },
    {
        name: 'products',
        path: '/products',
        component: Products,
        meta: {
            auth: false
        }
    },
    {
        name: 'products/create',
        path: '/products/create',
        component: ProductsCreate,
        meta: {
            auth: false
        }
    },
    {
        name: 'products/update',
        path: '/products/:id',
        component: ProductsUpdate,
        meta: {
            auth: false
        }
    },
    {
        name: '/transaction',
        path: '/transaction',
        component: Transaction,
        meta: {
            auth: false
        }
    },
    {
        name: '/product/recipes',
        path: '/product/recipes',
        component: ProductRecipes,
        meta: {
            auth: false
        }
    },
    {
        name: '/product/recipes/create',
        path: '/product/recipes/create',
        component: ProductRecipesCreate,
        meta: {
            auth: false
        }
    },
    {
        name: '/inventory/in',
        path: '/inventory/in',
        component: InventoryIn,
        meta: {
            auth: false
        }
    },
    {
        name: '/inventory/out',
        path: '/inventory/out',
        component: InventoryOut,
        meta: {
            auth: false
        }
    }, {
        name: '/report',
        path: '/report',
        component: Report,
        meta: {
            auth: false
        }
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            auth: false
        }
    }
]

window.onload = function () {
    const router = new VueRouter({ mode: 'history', routes: routes, });
    const app = new Vue(Vue.util.extend({ router, vuetify }, App)).$mount("#app");
    return { app, router };
}
require('./bootstrap');

window.Vue = require('vue');


// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import vuetify from './vuetify';


Vue.use(VueRouter, VueAxios, axios);

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

// membuat router

const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard
    },
    {
        name: 'items',
        path: '/items',
        component: Items
    },
    {
        name: 'items-create',
        path: '/items/create',
        component: ItemsCreate
    },
    {
        name: 'items-update',
        path: '/items/:id',
        component: ItemsUpdate
    },
    {
        name: 'products',
        path: '/products',
        component: Products
    },
    {
        name: 'products/create',
        path: '/products/create',
        component: ProductsCreate
    },
    {
        name: 'products/update',
        path: '/products/:id',
        component: ProductsUpdate
    },
    {
        name: '/transaction',
        path: '/transaction',
        component: Transaction
    },
    {
        name: '/product/recipes',
        path: '/product/recipes',
        component: ProductRecipes
    },
    {
        name: '/product/recipes/create',
        path: '/product/recipes/create',
        component: ProductRecipesCreate
    },
    {
        name: '/inventory/in',
        path: '/inventory/in',
        component: InventoryIn
    },
    {
        name: '/inventory/out',
        path: '/inventory/out',
        component: InventoryOut
    }, {
        name: '/report',
        path: '/report',
        component: Report
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    }
]

window.onload = function () {
    const router = new VueRouter({ mode: 'history', routes: routes });
    const app = new Vue(Vue.util.extend({ router, vuetify }, App)).$mount("#app");
    return { app, router };
}
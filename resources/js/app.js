require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
import VueRouter from 'vue-router';
import StoreDefinition from './store';

import Home from './components/Home.vue'
import About from "./components/About";
import Navbar from "./partial/Navbar";
import Footer from "./partial/Footer";
import Product from "./product/Index";
import ProductListing from "./product/Listing";
import ProductShow from "./product/Show";
import Basket from "./basket/Basket";
import FatalError from "./shared/components/FatalError";
import ValidationError from "./shared/components/ValidationError";
import Success from "./shared/components/Success";
import Login from "./auth/Login";
import Register from "./auth/Register";

Vue.use(Vuex);
Vue.use(VueRouter);

Vue.component("nav-bar", Navbar);
Vue.component("product", Product);
Vue.component("product-listing", ProductListing);
Vue.component("app-footer", Footer);
Vue.component("fatal-error", FatalError);
Vue.component("v-error", ValidationError);
Vue.component("success", Success);

let routes = [
    {
        path: '/kingdom_vision/home',
        component: Home,
        name: "Home"
    },
    {
        path: '/kingdom_vision/about',
        component: About,
        name: "About"
    },
    {
        path: "/kingdom_vision/product/:id",
        component: ProductShow,
        name: "ProductShow"
    },
    {
        path: "/kingdom_vision/basket",
        component: Basket,
        name: "Basket"
    },
    {
        path: "/kingdom_vision/auth/login",
        component: Login,
        name: "login"
    },
    {
        path: "/kingdom_vision/auth/register",
        component: Register,
        name: "register"
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

const store = new Vuex.Store(StoreDefinition);

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }
        return Promise.reject(error);
    }
);

const app = new Vue({
    el: '#app',
    router,
    store,
    beforeCreate() {
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
    },
});



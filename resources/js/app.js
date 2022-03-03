require('./bootstrap');
import VueRouter from 'vue-router';
import VueEvents from 'vue-events';

import CustomersIndex from './components/customers/CustomersIndex.vue'
import CreateCustomer from './components/customers/CreateCustomer.vue'
import LoginComponent from './LoginComponent.vue'
import RegisterComponent from './RegisterComponent.vue'
import MainApp from './components/MainApp';
import store from './store/index';
import Vue from 'vue'


Vue.use(VueRouter);
Vue.use(VueEvents);

import { routes } from "./routes";

const router = new VueRouter({
    routes,
    mode: 'history',
    store
});

const app = new Vue({
    el: '#app',
    components: { MainApp, LoginComponent, RegisterComponent, CreateCustomer, CustomersIndex },
    router,
    store,
  
})

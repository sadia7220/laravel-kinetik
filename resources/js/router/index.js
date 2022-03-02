console.log('saaaaaaaaaaaa')

import { createRouter, createWebHistory } from 'vue-router'

import CustomersIndex from '../components/customers/CustomersIndex.vue'
import CreateCustomer from '../components/customers/CreateCustomer.vue'

const routes = [
    {
        path: '/dash',
        name: 'customers.index',
        component: CustomersIndex
    },
    {
        path: '/store',
        name: 'customers.store',
        component: CreateCustomer
    }
];



export default createRouter({
    history: createWebHistory(),
    routes
})
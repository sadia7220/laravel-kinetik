console.log('saaaaaaaaaaaa')

import { createRouter, createWebHistory } from 'vue-router'

import CustomersIndex from '../components/customers/CustomersIndex.vue'
import CreateCustomer from '../components/customers/CreateCustomer.vue'

import LoginComponent from '../LoginComponent.vue'

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
    },
    {
        path: '/secret',
        name: 'secret',
        component: LoginComponent
    },

];


const router = createRouter({
    history: createWebHistory(),
    routes
  })


export default router;




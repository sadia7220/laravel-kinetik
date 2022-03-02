require('./bootstrap');

import { createApp } from 'vue';
import router from './router'

import CustomersIndex from './components/customers/CustomersIndex.vue';

createApp({
    components: {
        CustomersIndex
    }
}).use(router).mount('#app')
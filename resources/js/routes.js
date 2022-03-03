import CreateCustomer from './components/customers/CreateCustomer.vue';

import CustomersIndex from './components/customers/CustomersIndex.vue';

export const routes = [
    {path: '/list', name: 'listCustomers', component: CustomersIndex},
    {path: '/create', name: 'createCustomer', component: CreateCustomer},
];
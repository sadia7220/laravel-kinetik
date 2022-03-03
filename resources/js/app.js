import './bootstrap';

window.Vue = require('vue').default;

import store from './store/index';


Vue.component('login', require('./LoginComponent.vue').default);
Vue.component('logout', require('./Logout.vue').default);
Vue.component('register', require('./RegisterComponent.vue').default);

Vue.component('customers', require('./components/customers/CustomersIndex.vue').default);
Vue.component('create-customer', require('./components/customers/CreateCustomer.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    store
});


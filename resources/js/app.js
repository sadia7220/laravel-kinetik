import './bootstrap';

window.Vue = require('vue').default;

import store from './store/index';

// import CustomersIndex from './components/customers/CustomersIndex.vue'
// import CreateCustomer from './components/customers/CreateCustomer.vue'
// import LoginComponent from './LoginComponent.vue'
// import RegisterComponent from './RegisterComponent.vue'
// import MainApp from './components/MainApp';



Vue.component('login', require('./LoginComponent.vue').default);


Vue.component('customers', require('./components/customers/CustomersIndex.vue').default);
Vue.component('create-customer', require('./components/customers/CreateCustomer.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    store
});


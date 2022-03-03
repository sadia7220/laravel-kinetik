<template>
    <div>
        <h4 class="text-center font-weight-bold">Customers</h4>

        <div class="mr-100">
            <a v-bind:href="'/create_customers'" class="btn btn-primary">Create Customer</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                 <th scope="col">Address</th>
                 <th scope="col">Billing</th>
               
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
               
                <td>{{customer.name}}</td>
                <td>{{customer.email}}</td>
                 <td>{{customer.address}}</td>
                <td>
                     <button class="btn btn-info btn-sm ml-2" @click="fetchBills(customer)">Details</button>
                   
                </td>
              
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Customers",
        mounted() {
            this.$store.dispatch('fetchCustomers')
        },
        methods: {
            fetchBills(customer) {
                this.$store.dispatch('fetchBills',customer)
            },

        
        },
        computed: {
            ...mapGetters([
                'customers'
            ])
        }
    }
</script>

<style scoped>

</style>
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
                <th scope="col">Actions</th>
             
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
               
                <td>{{customer.name}}</td>
                <td>{{customer.email}}</td>
                 <td>{{customer.address}}</td>
                <td>
                     <button class="btn btn-info btn-sm ml-2" @click="deleteCustomer(customer)">Details</button>
                   
                </td>
                 <td>
            
                    <button class="btn btn-danger btn-sm" @click="deleteCustomer(customer)">Delete</button>
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
            deleteCustomer(customer) {
                this.$store.dispatch('deleteCustomer',customer)
            },

            deleteCustomer(customer) {
                this.$store.dispatch('deleteCustomer',customer)
            }
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
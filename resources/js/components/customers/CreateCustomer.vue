<template>
    <form action="/" @submit="createCustomer(customer)">
        <h4 class="text-center font-weight-bold">Customer creation form</h4>
        <div class="form-group mb-2">
            <input type="text" placeholder="Name" v-model="customer.name" class="form-control">

        </div>
        <div class="form-group mb-2">
           <input type="text" placeholder="Email" v-model="customer.email" class="form-control">
        </div>
         <div class="form-group mb-2">
            <input type="text" placeholder="Password" v-model="customer.password" class="form-control">

        </div>
        <div class="form-group mb-2">
           <input type="text" placeholder="Confirm Password" v-model="customer.password_confirmation" class="form-control">
        </div>
         <div class="form-group mb-2">
            <input type="text" placeholder="Address" v-model="customer.address" class="form-control">

        </div>
    
        <div class="form-group mb-4">
            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createCustomer(customer)">Submit
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "CreateCustomer",
        data() {
            return {
                customer: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    address: '',
                }
            }
        },
        mounted() {

        },
        methods: {
            createCustomer(customer) {
                console.log(customer)
                this.$store.dispatch('createCustomer', customer)
                
            }
        },
        computed: {
            isValid() {
                return this.customer.name !== '' && this.customer.email !== '' && this.customer.password !== '' && this.customer.password_confirmation !== '' && this.customer.address !== ''
            }
        }
    }
</script>

<style scoped>

</style>
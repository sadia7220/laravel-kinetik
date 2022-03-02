<template>
    <div>
        <h3 class="text-center">Create Customer</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCustomer">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="customer.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="customer.email">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios'
    export default {
        
        data() {
            return {
                customer: {}
            }
        },
        methods: {
            addCustomer() {
                axios
                    .post('http://localhost:8000/api/customer/create', this.customer)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
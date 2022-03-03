<template>
    <div>
        <h4 class="text-center font-weight-bold">Bills</h4>

        <div class="mr-100">
            <a v-bind:href="'/create_bills'" class="btn btn-primary">Create Bill</a>
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
            <tr v-for="bill in bills" :key="bill.id">
               
                <td>{{bill.name}}</td>
                <td>{{bill.email}}</td>
                 <td>{{bill.address}}</td>
                <td>
                     <button class="btn btn-info btn-sm ml-2">Details</button>
                   
                </td>
                 <td>
            
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Bills",
        mounted() {
            this.$store.dispatch('fetchBills')
        },
        methods: {
         
        },
        computed: {
            ...mapGetters([
                'bills'
            ])
        }
    }
</script>

<style scoped>

</style>
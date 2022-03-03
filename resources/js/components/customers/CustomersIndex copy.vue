<template>
    <div>
        <h2 class="text-center">Customers List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="data in customer" :key="data.id">
                <td>{{ data.id }}</td>
                <td>{{ data.name }}</td>
                <td>{{ data.email }}</td>
                <!-- <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: company.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCompany(company.id)">Delete</button>
                    </div>
                </td> -->
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                customer: []
            }
        },
        created() {
             console.log(12222)
            // this.axios
            //     .get('http://localhost:8000/api/customers')
            //     .then(response => {
            //         console.log(response)
            //         this.customer = response.data;
            //     });

                 this.axios.get(`http://localhost:8000/api/customers`, {
            headers: {
                'Authorization': `Bearer 1|P3FV4xgmm5RIfPWNAkvVhLzEy9LF4CyBeL27OziD`
            }
        })
        then(response => {
                    console.log(12222)
                    this.customer = response.data;
                });
                
                },
        methods: {
          
        }
    }
</script>
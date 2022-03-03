<template>
    <div v-if="!secrets.length" class="row pr-10">
        <form @submit.prevent="handleLogin">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="formData.email"/>
            
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="formData.password"/>
            </div>
        
            <div class="form-group text-center">
                <div class="col-xs-12 p-b-20">
                    <button class="btn-sm btn-block btn-info btn-rounded m-4" type="submit">Log In</button>
                </div>
            </div>
        

            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    Don't have an account? <a href="/register" class="text-info m-l-5"><div><b>Sign Up</b></div></a>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            secrets: [],
            formData: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        handleLogin() {
            console.log(this.formData)
            axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post('http://127.0.0.1:8000/api/user/login', this.formData).then(response => {
            console.log(response)
            window.location.href = '/customers';
            console.log('User signed in!');  

            }).catch(error => console.log(error)); // credentials didn't match
            });    
        },
    }
}
</script>
<template>
    <div v-if="!secrets.length" class="row pr-10">
        <form @submit.prevent="handleLogin">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" v-model="formData.email"/>
            
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
import Cookies from "js-cookie";
import swal from 'sweetalert';

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
            console.log(response.data)
           

             if (response.data.response_code == '200') {
                const access_token = response.data.access_token;
               
                console.log(access_token)
                if ('access_token' in response.data) {
                    console.log(10101)  
                   
                    localStorage.setItem('access_token', access_token);
                
                    window.location.href = '/customers';
                 
                
                } else {
                   
                }
                }
                else{
               
                }

            }).catch(error => console.log(error)); // credentials didn't match
            });    
        },
    }
}
</script>
<template>
    <div class="row pr-10">
       
        <button class="btn btn-block btn-danger" @click="logout()">Logout
            </button>

    </div>
</template>

<script>

export default {
    data() {
        return {
           
        }
    },
    methods: {
        logout() {
           localStorage.clear();
   
            window.location.href = '/';
        },
    }
}
</script>
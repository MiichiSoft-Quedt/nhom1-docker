<template>
    <div>
        <div class="row">
            <div class="col-md-6 mt-5 mx-auto">
                <form @submit.prevent="login" class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="border-bottom mb-3">
                        <h1>Login</h1>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" v-model="data.email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="data.password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-white">Login</button>
                    <router-link to="/register" class="btn btn-primary btn-block" >Register</router-link>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { API_DEFAULT } from '../constant/const';
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            data: {
                email:"",
                password:"",
            }
        }
    },
    methods: {
        login() {
            let uri = `${API_DEFAULT}login`;
            this.axios.post(uri, this.data).then((response)=>{
                Swal.fire({
                    icon: "success",
                    title: "Login Successfully",
                    showConfirmButton: false,
                    timer: 500,
                });
                this.$router.push({ path: '/dashboard'})
            }).catch((error)=>{
                Swal.fire({
                    icon: "error",
                    text: "Incorrect account or password!",
                });
            })
        }
    }
}
</script>
<style lang="">
    
</style>
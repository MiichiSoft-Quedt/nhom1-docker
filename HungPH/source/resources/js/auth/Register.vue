<template>
    <div>
        <div class="row">
            <div class="col-md-6 mt-5 mx-auto">
                <form @submit.prevent="register" class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="border-bottom mb-3">
                        <h1>Register</h1>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" v-model="data.name" class="form-control" name="name" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" v-model="data.email" class="form-control" name="email" placeholder="Email"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" v-model="data.password" class="form-control" name="password" placeholder="Password"/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block text-white">
                            Register
                        </button>
                        <router-link
                            to="/"
                            class="btn btn-primary btn-block"
                            >Cancel</router-link
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { API_DEFAULT } from "../constant/const";
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            data: {
                name: "",
                email: "",
                password: "",
            },
        };
    },
    methods: {
        register() {
            let uri = `${API_DEFAULT}register`;
            this.axios
                .post(uri, this.data)
                .then((response) => {
                    Swal.fire({
                        icon: "success",
                        title: "Register Account Successfully",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                    this.$router.push({ path: '/'})
                })
                .catch((error) => {
                    Swal.fire({
                        icon: "error",
                        text: "Something error wrong!",
                    });
                });
        },
    },
};
</script>
<style lang=""></style>

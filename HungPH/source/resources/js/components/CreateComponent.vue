<template>
    <div class="row justify-content-center container">
        <h1 class="mt-5">Create a User</h1>

        <form class="row g-3" @submit.prevent="addUser">
            <div class="col-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" v-model="user.email"/>
            </div>
            <div class="col-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" v-model="user.name" />
            </div>
             <div class="col-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" v-model="user.department" />
            </div>

            <div class="col-2">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" v-model="user.gender">
                    <option selected>...</option>
                    <option>Man</option>
                    <option>Woman</option>
                </select>
            </div>
            <div class="col-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Ha Noi" v-model="user.address" />
            </div>
            <div class="col-2">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" v-model="user.city"/>
            </div>
            <div class="col-2">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" v-model="user.phone"/>
            </div>
            <div class="col-2">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" v-model="user.date"/>
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary text-white">Create</button>
                <router-link class="btn btn-primary" to="/index">Cancel</router-link>
            </div>
        </form>
    </div>
</template>

<script>
import { API_DEFAULT } from "../constant/const";
import Swal from "sweetalert2";

export default {
    data() {
        return {
            user: {
                name: "",
                email: "",
                gender: "",
                department:"",
                address: "",
                city: "",
                phone: "",
                date: "",
            },
        };
    },
    methods: {
        addUser() {
            let uri = `${API_DEFAULT}posts/create`;
            Swal.fire({
                title: "Are you sure?",
                text: "You want be create this reecord!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, create it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Create!",
                        "Your file has been created.",
                        "success"
                    );
                    this.axios.post(uri, this.post).then((response) => {
                        this.$router.push({ path: "/post" });
                    });
                }
            });
        },
    },
};
</script>

<template>
    <div class="row justify-content-center">
        <h1>Edit Post</h1>
        <form action="" @submit.prevent="updatePost">
            <div class="row">
                <label for="">Post Title:</label>
                <input type="text" class="form-control" v-model="post.title" />
            </div>
            <div class="row">
                <label for="">Post body:</label>
                <textarea
                    class="form-controll"
                    v-model="post.body"
                    rows="5"
                ></textarea>
            </div>
            <br />
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
                <router-link to="/post" class="btn btn-primary"
                    >Cancel</router-link
                >
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
            post: {
                title: "",
                body: "",
            },
        };
    },
    // created() {
    //     let uri = `${API_DEFAULT}posts/edit/${this.$route.params.id}`;
    //     this.axios.get(uri).then((response) => {
    //         this.post = response.data.data;
    //     });
    // },
    methods: {
        updatePost() {
            let uri = `${API_DEFAULT}posts/update/${this.$route.params.id}`;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be update this record!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Update!",
                        "Your file has been updated.",
                        "success"
                    );
                    this.axios.put(uri, this.post).then((response) => {
                        this.$router.push({ path: "/post" });
                    });
                }
            });
        },
    },
};
</script>

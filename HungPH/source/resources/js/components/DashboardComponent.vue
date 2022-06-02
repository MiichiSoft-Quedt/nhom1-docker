<template>
    <div>
        <div id="app">
            <div class="row">
                <div class="col-2">
                    <!-- avarta -->
                    <div>
                        
                    </div>
                    <button @click.prevent="logout" class="btn btn-primary">
                        Logout
                    </button>
                    <router-link class="btn btn-primary" to="/consumer"
                        >Consumer</router-link
                    >
                </div>
                <div class="col-10"></div>
            </div>
        </div>
    </div>
</template>
<script>
import { API_DEFAULT } from "../constant/const";
export default {
    data: () => {
        return {};
    },
    computed: {},
    methods: {
        logout() {
            let uri = `${API_DEFAULT}logout`;
            this.axios.get(uri).then((response) => {
                this.$router.push({ path: "/" });
            });
        },
    },
};
</script>
<style lang=""></style>

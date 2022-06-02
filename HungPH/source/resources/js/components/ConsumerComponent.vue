<template>
    <div id="app">
        <v-app id="inspire">
            <div class="row">
                <div class="col-2">
                    <v-card height="80%" width="256" class="mx-auto mt-5">
                        <v-navigation-drawer permanent>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h6">
                                        Application
                                    </v-list-item-title>
                                    <v-list-item-subtitle>
                                        Admin
                                    </v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>

                            <v-divider></v-divider>

                            <v-list dense nav>
                                <v-list-item
                                    v-for="item in menu"
                                    :key="item.title"
                                    link
                                >
                                    <v-list-item-icon>
                                        <v-icon>{{ item.icon }}</v-icon>
                                    </v-list-item-icon>

                                    <v-btn width="200" >
                                        <v-list-item-content>
                                            <v-list-item-title>{{
                                                item.title
                                            }}</v-list-item-title>
                                        </v-list-item-content>
                                    </v-btn>
                                </v-list-item>
                            </v-list>
                        </v-navigation-drawer>
                    </v-card>
                </div>
                <div class="col-10">
                    <v-card-title>
                        Consumer
                        <v-spacer></v-spacer>
                        <v-text-field
                            v-model="search"
                            append-icon="mdi-magnify"
                            label="Search"
                            single-line
                            hide-details
                        ></v-text-field>
                    </v-card-title>
                    <v-data-table
                        :headers="headers"
                        :items="items"
                        class="elevation-1"
                        :search="search"
                    >
                    </v-data-table>
                </div>
            </div>
        </v-app>
    </div>
</template>

<script>
import { API_DEFAULT } from "../constant/const";
import Swal from "sweetalert2";

export default {
    data() {
        return {
            search: "",
            items: [],
            pagination: {},
            totalItems: [],
            loading: true,
            menu: [
                { title: "Dashboard", icon: "mdi-view-dashboard" },
                { title: "Photos", icon: "mdi-image" },
                { title: "About", icon: "mdi-help-box" },
            ],
        };
    },
    computed: {
        headers() {
            return [
                {
                    text: "Name",
                    align: "start",
                    sortable: false,
                    value: "name",
                },
                { text: "Email", value: "email" },
                { text: "Gender", value: "gender" },
                { text: "City", value: "city" },
                { text: "Address", value: "address" },
                { text: "Phone", value: "phone" },
                { text: "Actions", value: "actions" },
            ];
        },
    },
    created() {
        let uri = `${API_DEFAULT}v1/consumer`;
        this.axios.get(uri).then((response) => {
            this.items = response.data.data;
        });
    },
    methods: {
        deleteUser(id) {
            let uri = `${API_DEFAULT}posts/delete/${id}`;

            Swal.fire({
                title: "Are you sure?",
                text: "You wont'n be delete this record!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                comfirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Deleted!",
                        "You file has been deleted",
                        "success"
                    );
                    this.axios.delete(uri).then((response) => {
                        this.post.splice(this.post.indexOf(id), 1);
                    });
                }
            });
        },
    },
};
</script>

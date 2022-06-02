import VueRouter from "vue-router";
import CreateComponent from './components/CreateComponent.vue';
import ConsumerComponent from './components/ConsumerComponent.vue';
import EditComponent from './components/EditComponent.vue';
import DashboardComponent from "./components/DashboardComponent.vue";
import Login from "./auth/Login.vue";
import Register from "./auth/Register.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            name: "login",
            path: "/",
            component: Login,
        },
        {
            name: "register",
            path: "/register",
            component: Register,
        },
        {
            name: "dashboard",
            path: "/dashboard",
            component: DashboardComponent,
        },
        {
            name: 'index',
            path: '/consumer',
            component: ConsumerComponent
        },
        {
            name: 'create',
            path: '/create',
            component: CreateComponent
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: EditComponent
        }
    ],
});

export default router;

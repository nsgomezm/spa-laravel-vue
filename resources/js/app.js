require('./bootstrap');


const { createApp } = require("@vue/runtime-dom");

import { createWebHistory, createRouter } from "vue-router";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// components vue router

import Index from './components/comments/Index.vue'
import DataTable  from './components/comments/DataTable'
import Form from './components/comments/Form'

const routes = [
    {
        path: "/",
        name: "Table",
        component: DataTable,
    },
    {
        path: "/form/:id?",
        name: "Form",
        component: Form,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp(Index)
app.use(router)
app.use(VueSweetalert2)
app.mount('#app')

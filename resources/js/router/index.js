import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Dashboard from "../components/dashboard/container"
import Contact from "../components/contact/container"
import Email from "../components/email/container"

const routes = [
    {
        component: Dashboard,
        name: "dashboard",
        path: "/dashboard"
    },
    {
        component: Contact,
        name: "contact",
        path: "/contact"
    },
    {
        component: Email,
        name: "email",
        path: "/email"
    }
];

export default new VueRouter({
    routes //short for 'routes: routes'
})

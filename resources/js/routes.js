import Dashboard from "./pages/Dashboard.vue";
import Sales from "./pages/Sales.vue";

export default [
    {
        path: "/",
        name: "dashboard",
        component: Dashboard,
    },
    {
        path: "/sale",
        name: "sales",
        component: Sales,
    },
];

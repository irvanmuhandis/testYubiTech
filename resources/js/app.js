import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { createRouter, createWebHistory } from "vue-router";
import Routes from "./routes.js";
import { createStore } from "vuex";
import { myModule } from "./store/store.js";

const app = createApp({});
const store = createStore(myModule);
const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

app.use(router);
app.use(store);
app.mount("#app");

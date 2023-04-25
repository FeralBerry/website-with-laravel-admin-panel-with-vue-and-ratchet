import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/Admin/HeaderComponent";
import LeftBarComponent from "./components/back/admin/LeftBarComponent";
import MainComponent from "./components/back/admin/MainComponent";
import FooterComponent from "./components/back/admin/FooterComponent";
import BreadCrumbComponent from "./components/back/admin/BreadCrumbComponent";

const routes = [
    {path: '/admin', component: MainComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('back-header-component', HeaderBackComponent);
app.component('bread-crumb-component', BreadCrumbComponent);
app.component('left-bar-component', LeftBarComponent);
app.component('main-component', MainComponent);
app.component('footer-component', FooterComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




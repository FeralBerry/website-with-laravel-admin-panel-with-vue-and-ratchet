import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import MainComponent from "./components/front/MainComponent";
import HeaderComponent from "./components/front/HeaderComponent";
import HeaderBackComponent from "./components/back/HeaderComponent";
import SliderComponent from "./components/front/SliderComponent";
import FooterComponent from "./components/front/FooterComponent";
import ShopComponent from "./components/front/ShopComponent";
import BlogComponent from "./components/front/BlogComponent";
import ContactComponent from "./components/front/ContactComponent";
import BreadCrumbComponent from "./components/front/BreadCrumbComponent";
import ProductComponent from "./components/front/ProductComponent";
import RegisterComponent from "./components/front/RegisterComponent";
import LoginComponent from "./components/front/LoginComponent";
import HomeComponent from "./components/back/HomeComponent";

const routes = [
    {path: '/', component: MainComponent},
    {path: '/contact', component: ContactComponent},
    {path: '/shop', component: ShopComponent},
    {path: '/shop/product/:id', component: ProductComponent},
    {path: '/blog', component: BlogComponent},
    {path: '/login', component: LoginComponent},
    {path: '/register', component: RegisterComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('main-component', MainComponent);
app.component('header-component', HeaderComponent);
app.component('slider-component', SliderComponent);
app.component('footer-component', FooterComponent);
app.component('contact-component', ContactComponent);
app.component('shop-component', ShopComponent);
app.component('product-component', ProductComponent);
app.component('blog-component', BlogComponent);
app.component('register-component', RegisterComponent);
app.component('login-component', LoginComponent);
app.component('home-component', LoginComponent);
app.component('bread-crumb-component', BreadCrumbComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');

const backRouters = [
    {path: '/user', component: HomeComponent},
];
const backRouter = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    backRouters,
});
const backApp = createApp({});
backApp.use(backRouter);

backApp.component('home-component', HomeComponent);
backApp.component('back-header-component', HeaderBackComponent);

backApp.mount('#app');




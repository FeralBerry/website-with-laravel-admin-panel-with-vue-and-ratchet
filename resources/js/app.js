import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import MainComponent from "./components/front/MainComponent";
import HeaderComponent from "./components/front/HeaderComponent";
import SliderFaqComponent from "./components/front/SliderFaqComponent";
import SliderComponent from "./components/front/SliderComponent";
import FooterComponent from "./components/front/FooterComponent";
import ShopComponent from "./components/front/ShopComponent";
import CartComponent from "./components/front/CartComponent";
import CheckoutComponent from "./components/front/CheckoutComponent";
import BlogComponent from "./components/front/BlogComponent";
import BlogArticleComponent from "./components/front/BlogArticleComponent";
import ContactComponent from "./components/front/ContactComponent";
import BreadCrumbComponent from "./components/front/BreadCrumbComponent";
import ProductComponent from "./components/front/ProductComponent";
import RegisterComponent from "./components/front/RegisterComponent";
import LoginComponent from "./components/front/LoginComponent";

const routes = [
    {path: '/', component: MainComponent},
    {path: '/contact', component: ContactComponent},
    {path: '/shop', component: ShopComponent},
    {path: '/shop/:id', component: ShopComponent},
    {path: '/shop/product/:id', component: ProductComponent},
    {path: '/cart', component: CartComponent},
    {path: '/checkout', component: CheckoutComponent},
    {path: '/blog', component: BlogComponent},
    {path: '/blog/article/:id', component: BlogArticleComponent},
    {path: '/login', component: LoginComponent},
    {path: '/register', component: RegisterComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({

});
app.use(router);

app.component('main-component', MainComponent);
app.component('header-component', HeaderComponent);
app.component('slider-component', SliderComponent);
app.component('slider-faq-component', SliderFaqComponent);
app.component('footer-component', FooterComponent);
app.component('contact-component', ContactComponent);
app.component('shop-component', ShopComponent);
app.component('cart-component', CartComponent);
app.component('checkout-component', CheckoutComponent);
app.component('product-component', ProductComponent);
app.component('blog-component', BlogComponent);
app.component('blog-article-component', BlogArticleComponent);
app.component('register-component', RegisterComponent);
app.component('login-component', LoginComponent);
app.component('home-component', LoginComponent);
app.component('bread-crumb-component', BreadCrumbComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');

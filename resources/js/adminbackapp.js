import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/admin/HeaderComponent";
import LeftBarComponent from "./components/back/admin/LeftBarComponent";
import MainComponent from "./components/back/admin/MainComponent";
import FooterComponent from "./components/back/admin/FooterComponent";
import BreadCrumbComponent from "./components/back/BreadCrumbComponent";
import BlogComponent from "./components/back/admin/pages/BlogComponent";
import BlogTagsComponent from "./components/back/admin/pages/BlogTagsComponent";
import FreeCoursesComponent from "./components/back/admin/pages/FreeCoursesComponent";
import FreeCoursesAddComponent from "./components/back/admin/pages/FreeCoursesAddComponent";
import FreeCoursesNameComponent from "./components/back/admin/pages/FreeCoursesNameComponent";
import PayCoursesComponent from "./components/back/admin/pages/PayCoursesComponent";
import PayCoursesAddComponent from "./components/back/admin/pages/PayCoursesAddComponent";
import PayCoursesNameComponent from "./components/back/admin/pages/PayCoursesComponent";
import ShopComponent from "./components/back/admin/pages/ShopComponent";
import ShopAddComponent from "./components/back/admin/pages/ShopAddComponent";
import ShopEditComponent from "./components/back/admin/pages/ShopEditComponent";
import SliderComponent from "./components/back/admin/pages/SliderComponent";
import FaqSliderComponent from "./components/back/admin/pages/FaqSliderComponent";
import NavigateComponent from "./components/back/admin/pages/NavigateComponent";
import ContactComponent from "./components/back/admin/pages/ContactComponent";
import SeoComponent from "./components/back/admin/pages/SeoComponent";
import UsersComponent from "./components/back/admin/pages/UsersComponent";

const routes = [
    {path: '/admin', component: MainComponent},
    {path: '/admin/blog', component: BlogComponent},
    {path: '/admin/blog/tags', component: BlogTagsComponent},
    {path: '/admin/free_courses', component: FreeCoursesComponent},
    {path: '/admin/free_courses/add', component: FreeCoursesAddComponent},
    {path: '/admin/free_courses/name', component: FreeCoursesNameComponent},
    {path: '/admin/pay_courses', component: PayCoursesComponent},
    {path: '/admin/pay_courses/add', component: PayCoursesAddComponent},
    {path: '/admin/pay_courses/name', component: PayCoursesNameComponent},
    {path: '/admin/shop', component: ShopComponent},
    {path: '/admin/shop/add', component: ShopAddComponent},
    {path: '/admin/shop/edit', component: ShopEditComponent},
    {path: '/admin/slider', component: SliderComponent},
    {path: '/admin/faq_slider', component: FaqSliderComponent},
    {path: '/admin/navigate', component: NavigateComponent},
    {path: '/admin/contact', component: ContactComponent},
    {path: '/admin/seo', component: SeoComponent},
    {path: '/admin/users', component: UsersComponent},
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
app.component('blog-component', BlogComponent);
app.component('blog-tags-component', BlogTagsComponent);
app.component('free-courses-component', FreeCoursesComponent);
app.component('free-courses-add-component', FreeCoursesAddComponent);
app.component('free-courses-name-component', FreeCoursesNameComponent);
app.component('pay-courses-component', PayCoursesComponent);
app.component('pay-courses-add-component', PayCoursesAddComponent);
app.component('pay-courses-name-component', PayCoursesNameComponent);
app.component('shop-component', ShopComponent);
app.component('shop-add-component', ShopAddComponent);
app.component('shop-edit-component', ShopEditComponent);
app.component('footer-component', FooterComponent);
app.component('slider-component', SliderComponent);
app.component('faq-slider-component', FaqSliderComponent);
app.component('navigate-component', NavigateComponent);
app.component('contact-component', ContactComponent);
app.component('seo-component', SeoComponent);
app.component('users-component', UsersComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




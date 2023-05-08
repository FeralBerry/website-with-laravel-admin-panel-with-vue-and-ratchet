import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/admin/HeaderComponent";
import LeftBarComponent from "./components/back/admin/LeftBarComponent";
import MainComponent from "./components/back/admin/MainComponent";
import FooterComponent from "./components/back/admin/FooterComponent";
import BreadCrumbComponent from "./components/back/BreadCrumbComponent";
import BlogComponent from "./components/back/admin/pages/blog/BlogComponent";
import BlogAddComponent from "./components/back/admin/pages/blog/BlogAddComponent";
import BlogEditComponent from "./components/back/admin/pages/blog/BlogEditComponent";
import BlogTagsComponent from "./components/back/admin/pages/blog/BlogTagsComponent";
import FreeCoursesComponent from "./components/back/admin/pages/free_courses/FreeCoursesComponent";
import FreeCoursesAddComponent from "./components/back/admin/pages/free_courses/FreeCoursesAddComponent";
import FreeCoursesEditComponent from "./components/back/admin/pages/free_courses/FreeCoursesEditComponent";
import FreeCoursesNameComponent from "./components/back/admin/pages/free_courses/FreeCoursesNameComponent";
import PayCoursesComponent from "./components/back/admin/pages/pay_courses/PayCoursesComponent";
import PayCoursesAddComponent from "./components/back/admin/pages/pay_courses/PayCoursesAddComponent";
import PayCoursesEditComponent from "./components/back/admin/pages/pay_courses/PayCoursesEditComponent";
import PayCoursesNameComponent from "./components/back/admin/pages/pay_courses/PayCoursesNameComponent";
import ShopComponent from "./components/back/admin/pages/ShopComponent";
import ShopAddComponent from "./components/back/admin/pages/ShopAddComponent";
import ShopEditComponent from "./components/back/admin/pages/ShopEditComponent";
import SliderComponent from "./components/back/admin/pages/slider/SliderComponent";
import FaqSliderComponent from "./components/back/admin/pages/faq_slider/FaqSliderComponent";
import NavigateComponent from "./components/back/admin/pages/NavigateComponent";
import ContactComponent from "./components/back/admin/pages/contact/ContactComponent";
import SeoComponent from "./components/back/admin/pages/SeoComponent";
import UsersComponent from "./components/back/admin/pages/users/UsersComponent";
import UsersAddComponent from "./components/back/admin/pages/users/UsersAddComponent";

const routes = [
    {path: '/admin', component: MainComponent,name:'admin-index'},
    {path: '/admin/blog', component: BlogComponent,name:'admin-blog-index'},
    {path: '/admin/blog/add', component: BlogAddComponent,name:'admin-blog-add'},
    {path: '/admin/blog/edit/:id', component: BlogEditComponent,name:'admin-blog-edit'},
    {path: '/admin/blog/tags', component: BlogTagsComponent,name:'admin-blog-tags-index'},
    {path: '/admin/free_courses', component: FreeCoursesComponent,name:'admin-free-courses-index'},
    {path: '/admin/free_courses/add', component: FreeCoursesAddComponent,name:'admin-free-courses-add'},
    {path: '/admin/free_courses/edit/:id', component: FreeCoursesEditComponent,name:'admin-free-courses-edit'},
    {path: '/admin/free_courses_name', component: FreeCoursesNameComponent,name:'admin-free-courses-name-index'},
    {path: '/admin/pay_courses', component: PayCoursesComponent,name:'admin-pay-courses-index'},
    {path: '/admin/pay_courses/add', component: PayCoursesAddComponent,name:'admin-pay-courses-add'},
    {path: '/admin/pay_courses/edit/:id', component: PayCoursesEditComponent,name:'admin-pay-courses-edit'},
    {path: '/admin/pay_courses_name', component: PayCoursesNameComponent,name:'admin-pay-courses-name-index'},
    {path: '/admin/shop', component: ShopComponent,name:'admin-shop-index'},
    {path: '/admin/shop/add', component: ShopAddComponent,name:'admin-shop-add'},
    {path: '/admin/shop/edit', component: ShopEditComponent,name:'admin-shop-edit'},
    {path: '/admin/slider', component: SliderComponent,name:'admin-slider-index'},
    {path: '/admin/faq_slider', component: FaqSliderComponent,name:'admin-faq-slider-index'},
    {path: '/admin/navigate', component: NavigateComponent,name:'admin-navigate-index'},
    {path: '/admin/contact', component: ContactComponent,name:'admin-contact-index'},
    {path: '/admin/seo', component: SeoComponent,name:'admin-seo-index'},
    {path: '/admin/users', component: UsersComponent,name:'admin-users-index'},
    {path: '/admin/users/add', component: UsersAddComponent,name:'admin-users-add'},
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
app.component('blog-add-component', BlogAddComponent);
app.component('blog-edit-component', BlogEditComponent);
app.component('blog-tags-component', BlogTagsComponent);
app.component('free-courses-component', FreeCoursesComponent);
app.component('free-courses-add-component', FreeCoursesAddComponent);
app.component('free-courses-edit-component', FreeCoursesEditComponent);
app.component('free-courses-name-component', FreeCoursesNameComponent);
app.component('pay-courses-component', PayCoursesComponent);
app.component('pay-courses-add-component', PayCoursesAddComponent);
app.component('pay-courses-edit-component', PayCoursesEditComponent);
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
app.component('users-add-component', UsersAddComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




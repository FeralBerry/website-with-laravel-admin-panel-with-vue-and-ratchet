import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/HeaderComponent";
import ProfileComponent from "./components/back/user/pages/ProfileComponent";
import FreeCoursesComponent from "./components/back/user/pages/FreeCoursesComponent";
import FreeCourseComponent from "./components/back/user/pages/FreeCourseComponent";
import PayCoursesComponent from "./components/back/user/pages/PayCoursesComponent";
import PayCourseComponent from "./components/back/user/pages/PayCourseComponent";
import BuyCoursesComponent from "./components/back/user/pages/BuyCoursesComponent";
import SettingsComponent from "./components/back/user/pages/SettingsComponent";
import LeftBarComponent from "./components/back/LeftBarComponent";
import HomeComponent from "./components/back/HomeComponent";
import FooterComponent from "./components/back/FooterComponent";
import BreadCrumbComponent from "./components/back/BreadCrumbComponent";

const routes = [
    {path: '/user', component: HomeComponent},
    {path: '/user/profile', component: ProfileComponent},
    {path: '/user/settings', component: SettingsComponent},
    {path: '/user/free/courses', component: FreeCoursesComponent},
    {path: '/user/free/course/:id', component: FreeCourseComponent},
    {path: '/user/pay/courses', component: PayCoursesComponent},
    {path: '/user/pay/course/:id', component: PayCourseComponent},
    {path: '/user/buy/courses', component: BuyCoursesComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('back-header-component', HeaderBackComponent);
app.component('bread-crumb-component', BreadCrumbComponent);
app.component('settings-component', SettingsComponent);
app.component('profile-component', ProfileComponent);
app.component('free-courses-component', FreeCoursesComponent);
app.component('free-course-component', FreeCourseComponent);
app.component('pay-courses-component', PayCoursesComponent);
app.component('pay-course-component', PayCourseComponent);
app.component('buy-course-component', BuyCoursesComponent);
app.component('left-bar-component', LeftBarComponent);
app.component('home-component', HomeComponent);
app.component('footer-component', FooterComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




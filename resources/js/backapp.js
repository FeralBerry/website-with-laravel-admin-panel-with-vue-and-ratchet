import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/HeaderComponent";
import ProfileComponent from "./components/back/ProfileComponent";
import FreeCoursesComponent from "./components/back/FreeCoursesComponent";
import FreeCourseComponent from "./components/back/FreeCourseComponent";
import SettingsComponent from "./components/back/SettingsComponent";
import LeftBarComponent from "./components/back/LeftBarComponent";
import HomeComponent from "./components/back/HomeComponent";
import FooterComponent from "./components/back/FooterComponent";
import WebSocketComponent from "./components/back/WebSocketComponent";
import FreeCourseArticlePageComponent from "./components/back/FreeCourseArticlePageComponent";

const routes = [
    {path: '/user', component: HomeComponent},
    {path: '/user/profile', component: ProfileComponent},
    {path: '/user/settings', component: SettingsComponent},
    {path: '/user/free/courses', component: FreeCoursesComponent},
    {path: '/user/free/course/:id', component: FreeCourseComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('back-header-component', HeaderBackComponent);
app.component('settings-component', SettingsComponent);
app.component('profile-component', ProfileComponent);
app.component('free-courses-component', FreeCoursesComponent);
app.component('free-course-component', FreeCourseComponent);
app.component('free-course-article-page-component', FreeCourseArticlePageComponent);
app.component('left-bar-component', LeftBarComponent);
app.component('home-component', HomeComponent);
app.component('footer-component', FooterComponent);
app.component('web-socket-component', WebSocketComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




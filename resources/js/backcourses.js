import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import FreeCourseArticlePageComponent from "./components/back/FreeCourseArticlePageComponent";

const routes = [
    {path: ':courses/:id', component: FreeCourseArticlePageComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('free-course-article-page-component', FreeCourseArticlePageComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#course_article_page');




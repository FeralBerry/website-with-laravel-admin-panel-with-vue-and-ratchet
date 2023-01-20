import './bootstrap';
import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import HeaderBackComponent from "./components/back/HeaderComponent";
import SettingsComponent from "./components/back/SettingsComponent";
import LeftBarComponent from "./components/back/LeftBarComponent";
import HomeComponent from "./components/back/HomeComponent";
import FooterComponent from "./components/back/FooterComponent";
import WebSocketComponent from "./components/back/WebSocketComponent";

const routes = [
    {path: '/user', component: HomeComponent},
    {path: '/user/settings', component: SettingsComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(''),
    routes,
});

const app = createApp({});
app.use(router);

app.component('back-header-component', HeaderBackComponent);
app.component('settings-component', SettingsComponent);
app.component('left-bar-component', LeftBarComponent);
app.component('home-component', HomeComponent);
app.component('footer-component', FooterComponent);
app.component('web-socket-component', WebSocketComponent);
// Object.entries(import.meta.glob('./!**!/!*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.mount('#app');




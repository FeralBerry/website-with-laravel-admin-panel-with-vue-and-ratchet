<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <router-link to="/admin" class="brand-link">
            <img src="/logo.png" alt="Easy-Script" class="brand-image img-circle">
            <span class="brand-text font-weight-light">Easy-Script</span>
        </router-link>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <template v-if="data.auth_user_avatar === '' || data.auth_user_avatar === null">
                        <img src="/back/img/avatar/no-img45x45.png" class="img-circle elevation-2" :alt="data.user_name">
                    </template>
                    <template v-else>
                        <img :src="'/back/img/avatar/'+data.auth_user_avatar+''" class="img-circle elevation-2" :alt="data.user_name">
                    </template>
                </div>
                <div class="info">
                    <router-link to="/admin/settings" class="d-block">{{ data.user_name }}</router-link>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <router-link to="/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Главная
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/users" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Пользователи
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/seo" class="nav-link">
                            <i class="nav-icon fa fa-bolt"></i>
                            <p>
                                СЕО
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/contact" class="nav-link">
                            <i class="nav-icon fa fa-bolt"></i>
                            <p>
                                Контакты
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/navigate" class="nav-link">
                            <i class="nav-icon fa fa-bolt"></i>
                            <p>
                                Навигация
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Слайдеры
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/admin/slider" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Слайдер
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/faq_slider" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Слайдер FAQ
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/user_question" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Вопросы
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/admin/quotes" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Цитаты
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Блог
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/admin/blog" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Просмотреть
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/blog/add" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Добавить
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/blog/tags" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Теги
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Магазин
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/admin/shop" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Просмотреть
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/shop/add" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Добавить товар
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin/shop_category" class="nav-link">
                                    <i class="nav-icon fa fa-bolt"></i>
                                    <p>
                                        Категории товаров
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Курсы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Бесплатные
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <router-link to="/admin/free_courses" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Просмотреть
                                            </p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/admin/free_courses/add" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Добавить
                                            </p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/admin/free_courses_name" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Названия
                                            </p>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Платные
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <router-link to="/admin/pay_courses" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Просмотреть
                                            </p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/admin/pay_courses/add" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Добавить
                                            </p>
                                        </router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link to="/admin/pay_courses_name" class="nav-link">
                                            <i class="nav-icon fa fa-bolt"></i>
                                            <p>
                                                Названия
                                            </p>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>
<script>
    export default {
        name: "LeftBarComponent",
        props: ['data'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {

        },
        created() {

        }
    }
</script>

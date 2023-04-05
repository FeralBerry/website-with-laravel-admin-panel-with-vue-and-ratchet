<template>
    <header class="only-color">
        <!-- header top panel -->
        <div class="page-header-top">
            <div class="grid-row clear-fix">
                <address>
                    <!--<a href="tel:123-123456789" class="phone-number"><i class="fa fa-phone"></i>123-123456789</a>-->
                    <a href="mailto:uni@domain.com" class="email"><i class="fa fa-envelope-o"></i>uni@domain.com</a>
                </address>
                <div class="header-top-panel">
                    <div id="top_social_links_wrapper">
                        <div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
                        <div class="cws_social_links">
                            <a href="https://plus.google.com/" class="cws_social_link" title="Google +">
                                <i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i>
                            </a>
                            <a href="http://twitter.com/" class="cws_social_link" title="Twitter">
                                <i class="share-icon fa fa-twitter"></i>
                            </a>
                            <a href="http://facebook.com" class="cws_social_link" title="Facebook">
                                <i class="share-icon fa fa-facebook"></i>
                            </a>
                            <a href="http://dribbble.com" class="cws_social_link" title="Dribbble">
                                <i class="share-icon fa fa-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top panel -->
        <!-- sticky menu -->
        <div class="sticky-wrapper">
            <div id="top_menu" style="" class="sticky-menu">
                <div class="grid-row clear-fix">
                    <!-- logo -->
                    <router-link to="/" class="logo">
                        <img src="/logo.png" data-at2x="/logo.png" alt>
                        <h1>Easy-Script</h1>
                    </router-link>
                    <!-- / logo -->
                    <nav class="main-nav">
                        <ul class="clear-fix" >
                            <template v-for="link in data.navigate" :key="link.menu">
                                <li v-if="link.menuType === 2" class="megamenu">
                                    <template v-if="link.menu === 0">
                                        <router-link :to="link.href">{{ link.title }}</router-link>
                                        <ul class="clear-fix">
                                            <template v-for="item in data.navigate" :key="link.menu">
                                                <li v-if="item.submenu === link.id">
                                                    <div v-if="item.menuType === 3" class="header-megamenu">{{ item.title }}</div>
                                                    <template v-for="links in data.navigate" :key="link.menu">
                                                        <template v-if="links.menuType !== 3 && links.submenu === item.id">
                                                            <router-link :to="links.href">{{ links.title }}</router-link>
                                                        </template>
                                                    </template>
                                                </li>
                                            </template>
                                        </ul>
                                    </template>
                                </li>
                                <li v-if="link.menuType === 1">
                                    <template v-if="link.menu === 0">
                                        <router-link :to="link.href">{{ link.title }}</router-link>
                                        <ul class="clear-fix">
                                            <template v-for="item in data.navigate" :key="link.menu">
                                                <li v-if="item.submenu === link.id">
                                                    <router-link :to="item.href">{{ item.title }}</router-link>
                                                </li>
                                            </template>
                                        </ul>
                                    </template>
                                </li>
                                <li v-if="link.menuType === 0">
                                    <template v-if="link.menu === 0">
                                        <router-link :to="link.href">{{ link.title }}</router-link>
                                    </template>
                                </li>
                            </template>
                            <li style="padding-top: 15px" v-if="data.auth === false">
                                <router-link style="line-height: 30px;" to="/login">Вход</router-link>
                                <router-link style="line-height: 30px;" to="/register">Регистрация</router-link>
                            </li>
                            <li v-if="data.auth === true">
                                <a href="/user">{{ data.user_name }}</a>
                                <ul class="clear-fix user-menu">
                                    <li>
                                        <a href="/user/settings">Настройки пользователя</a>
                                    </li>
                                    <li>
                                        <a href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                            <input type="hidden" :value="csrf" name="_token">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a style="padding:25px 0 0 0;font-size:40px;color:#18bb7c" href="" class="fa fa-shopping-cart"></a>
                                <ul class="clear-fix" style="display:none;padding:10px;margin-left: -360px;margin-top: 20px" id="cart">

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sticky menu -->
    </header>

</template>
<script>

    export default {
        name: "HeaderComponent",
        props: ['data'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },

        mounted() {

        },
        created() {

        },
    }
</script>

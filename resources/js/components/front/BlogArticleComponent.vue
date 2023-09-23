<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        <div class="grid-row">
            <div class="page-content grid-col-row clear-fix">
                <div class="grid-col grid-col-9">
                    <!-- main content -->
                    <main id="main_blog_article">
                        <!-- blog post -->
                        <div class="blog-post">
                            <article id="blog_article">

                            </article>
                            <div class="tags-post" id="tags-post">

                            </div>
                        </div>
                        <!-- blog post -->
                        <div id="paginate_item">

                    </div>
                        <hr class="divider-color" />
                        <!-- comments for post -->
                        <div class="comments">
                            <div id="comments">

                            </div>
                        </div>
                        <!-- / comments for post -->
                        <hr class="divider-color" />
                        <div class="leave-reply">
                            <div class="title">Добавить комментарий</div>
                            <div id="comment_success" style="display: none"><h4 style="color: #18bb7c">Комментарий успешно добавлен!!</h4></div>
                            <form class="message-form clear-fix">
                                <p class="message-form-subject">
                                    <input id="blog_id" name="blog_id" type="hidden" value="" size="30" aria-required="true" placeholder="Subject">
                                </p>
                                <p class="message-form-message">
                                    <textarea id="message" name="message" cols="45" rows="8" aria-required="true" placeholder="Description"></textarea>
                                </p>
                                <p class="form-submit rectangle-button green medium">
                                    <a id="send_comment" class="cws-button border-radius alt">Добавить</a>
                                </p>
                            </form>
                        </div>
                    </main>
                    <!-- / main content -->
                </div>
                <div class="grid-col grid-col-3 sidebar">
                    <!-- widget search -->
                    <aside class="widget-search">
                        <form onsubmit="event.preventDefault();blog_search()" class="search-form">
                            <label>
                                <span class="screen-reader-text">Поиск:</span>
                                <input type="search" id="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:">
                            </label>
                            <input type="submit" class="search-submit" value="GO">
                        </form>
                    </aside>
                    <!--/ widget search -->
                    <!-- widget categories -->
                    <aside class="widget-categories">
                        <h2>Последние новости:</h2>
                        <hr class="divider-big" />
                        <ul id="last_news">

                        </ul>
                    </aside>
                    <!-- widget categories -->

                    <!-- widget tag cloud -->
                    <aside class="widget-tag">
                        <h2>Поиск по тегам</h2>
                        <hr class="divider-big margin-bottom" />
                        <div class="tag-cloud" id="blog_tags">

                        </div>
                        <hr class="margin-top" />
                    </aside>
                    <!-- / widget tag cloud -->
                    <!-- widget subscribe -->
                    <aside class="widget-subscribe">
                        <h2>Связаться:</h2>
                        <hr class="divider-big margin-bottom" />
                        <div>
                            <a href="https://wa.me/79687106270" class="fa fa-phone"></a>
                            <a href="https://github.com/FeralBerry" class="fa fa-github"></a>
                            <a href="mailto:pusiket90@yandex.ru" class="fa fa-envelope-o"></a>
                            <a href="" class="fa fa-youtube"></a>
                        </div>
                    </aside>
                    <!-- / widget subscribe -->
                </div>
            </div>
        </div >
    </div>
</template>
<script>
    export default {
        name: "BlogArticleComponent",
        props: ['data'],
        data(){
            return {
                breadcrumb:{
                    title:'Новости',
                    href:'/blog'
                }
            }
        },
        mounted() {

        },
        created() {

        },
        methods: {

        },
    }
</script>

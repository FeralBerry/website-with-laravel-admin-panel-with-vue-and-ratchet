<template>
    <div>
        <bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>
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
                                <!--<p class="message-form-author">
                                    <input id="author" name="author" type="hidden" value="" size="30" aria-required="true" placeholder="Your name">
                                </p>-->
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
                connection:new WebSocket("ws://127.0.0.1:4710"),
                blog_art:'',
                breadcrumb:{
                    title:''
                }
            }
        },
        mounted() {

        },
        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");
            connection.onopen = function(event){
                connection.send('{"command":"front_blog_article","url":"'+window.location.pathname+'"}')
            }
            connection.onmessage = function(event) {
                let data = JSON.parse(event.data);
                if(data.message === 'front_blog_article'){
                    document.querySelector('meta[name="description"]').setAttribute("content", ""+data.seo.description+"");
                    document.querySelector('head title').textContent = data.seo.title;
                    let blog_article = document.getElementById('blog_article');
                    let comments = document.getElementById('comments');
                    comments.innerHTML = '<div class="comment-title">Комментариев <span>('+data.count_comments+')</span></div><ol class="commentlist">';
                    data.comments.data.map((item) => {
                        let avatar = 'http://placehold.it/70x70';
                        if(item.avatar){
                            avatar = item.avatar;
                        }
                        let date = new Date(item.created_at);
                        let hour = date.getHours();
                        let year = date.getFullYear();
                        let minute = date.getMinutes();
                        let mounth = date.getMonth();
                        let day = date.getDate();
                        comments.innerHTML += '<li class="comment">' +
                                                    '<div class="comment_container clear">' +
                                                        '<img src="'+avatar+'" data-at2x="'+avatar+'" alt="" class="avatar">' +
                                                            '<div class="comment-text">' +
                                                                '<p class="meta">' +
                                                                    '<strong>'+item.name+'</strong>' +
                                                                    '<time datetime="2016-06-07T12:14:53+00:00">/ '+day+'.'+mounth+'.'+year+' '+hour+':'+minute+'</time>' +
                                                                '</p>' +
                                                                '<div class="description">' +
                                                                    '<p>'+item.description+'</p>' +
                                                                '</div>' +
                                                                /*'<a class="button reply" href="#"><i class="fa fa-rotate-left"></i> Reply</a>' +*/
                                                            '</div>' +
                                                        '</div>' +
                                                    '</li>';
                    });
                    comments.innerHTML += '</ol>';
                    data.blog.map((item) => {
                        document.getElementById('blog_id').value = item.id;
                        let date = new Date(item.created_at);
                        let mounth = date.getMonth();
                        if(mounth === 1){mounth = 'Янв'}
                        if(mounth === 2){mounth = 'Фев'}
                        if(mounth === 3){mounth = 'Мар'}
                        if(mounth === 4){mounth = 'Апр'}
                        if(mounth === 5){mounth = 'Мая'}
                        if(mounth === 6){mounth = 'Июн'}
                        if(mounth === 7){mounth = 'Июл'}
                        if(mounth === 8){mounth = 'Авг'}
                        if(mounth === 9){mounth = 'Сен'}
                        if(mounth === 10){mounth = 'Окт'}
                        if(mounth === 11){mounth = 'Ноя'}
                        if(mounth === 12){mounth = 'Дек'}
                        let day = date.getDate();
                        let tags_post = document.getElementById('tags-post');
                        let tags = item.tags.split(';');
                        let k = 0;
                        data.blog_tags.map((i) => {
                            if(i.id == tags[k]){
                                tags_post.innerHTML += '<a href="#"><i class="'+i.icon+'"></i>'+i.name+'</a>';
                            }
                            k++
                        });
                        blog_article.innerHTML = '<div class="post-info">' +
                            '<div class="date-post">' +
                            '<div class="day">'+day+'</div>' +
                            '<div class="month">'+mounth+'</div>' +
                            '</div>' +
                            '<div class="post-info-main">' +
                            '<div class="author-post">'+item.title+'</div>' +
                            '</div>' +
                            '<div class="comments-post" id="comments-post"><i class="fa fa-comment"></i> '+data.count_comments+'</div>' +
                            '</div>' +
                            +item.description;
                    });
                    let last_news = document.getElementById('last_news');
                    data.last_news.map((item) => {
                        last_news.innerHTML += '<li class="cat-item cat-item-1 current-cat"><a href="/blog/'+item.id+'">'+item.title+'</a></li>';
                    });
                    let blog_tags = document.getElementById('blog_tags');
                    data.blog_tags.map((item) => {
                        blog_tags.innerHTML += '<a href="#" rel="tag">'+item.name+'</a> ';
                    });
                } else if(data.message === 'blog_comment_add'){
                    let comments = document.getElementById('comments');
                    comments.innerHTML = '<div class="comment-title">Комментариев <span>('+data.count_comments+')</span></div><ol class="commentlist">';
                    data.comments.data.map((item) => {
                        let avatar = 'http://placehold.it/70x70';
                        if(item.avatar){
                            avatar = item.avatar;
                        }
                        let date = new Date(item.created_at);
                        let hour = date.getHours();
                        let year = date.getFullYear();
                        let minute = date.getMinutes();
                        let mounth = date.getMonth();
                        let day = date.getDate();
                        comments.innerHTML += '<li class="comment">' +
                            '<div class="comment_container clear">' +
                            '<img src="'+avatar+'" data-at2x="'+avatar+'" alt="" class="avatar">' +
                            '<div class="comment-text">' +
                            '<p class="meta">' +
                            '<strong>'+item.name+'</strong>' +
                            '<time datetime="2016-06-07T12:14:53+00:00">/ '+day+'.'+mounth+'.'+year+' '+hour+':'+minute+'</time>' +
                            '</p>' +
                            '<div class="description">' +
                            '<p>'+item.description+'</p>' +
                            '</div>' +
                            /*'<a class="button reply" href="#"><i class="fa fa-rotate-left"></i> Reply</a>' +*/
                            '</div>' +
                            '</div>' +
                            '</li>';
                    });
                    comments.innerHTML += '</ol>';
                    document.getElementById('comments-post').innerHTML = '<i class="fa fa-comment"></i> '+data.count_comments+'</div>';
                    document.getElementById('comment_success').style.display = 'block';
                    setTimeout(function() {
                        $('#comment_success').fadeOut('fast');
                    }, 5000);
                } else if('message' === "search_blog"){

                }
            }
            $('body').on('click', '#send_comment', function() {
                if ($('meta[name=user_id]').attr('content')) {
                    let user_id = $('meta[name=user_id]').attr('content');
                    let blog_id = document.getElementById('blog_id').value;
                    let message = document.getElementById('message').value;
                    connection.send('{"command":"blog_comment_add","user_id":"' + user_id + '","blog_id":"' + blog_id + '","message":"' + message + '"}');
                } else {
                    alert('Для добавления комментария нужно авторизоваться!')
                }
            });
        },
        methods: {

        },
    }
</script>

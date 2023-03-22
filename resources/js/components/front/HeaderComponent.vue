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
                    <a href="" class="fa fa-shopping-cart"></a>
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
        watch: {
            '$route' (to, from) {
                let connection = new WebSocket("ws://127.0.0.1:4710");
                let products = document.getElementById('products');
                connection.onopen = function(event){
                    if(to.fullPath.indexOf('shop')>0){
                        document.getElementById('products').innerHTML = "";
                        connection.send('{"command":"front_shop","url":"'+window.location.pathname+'"}')
                    } else if(to.fullPath.indexOf('blog/article')>0){
                        connection.send('{"command":"front_blog_article","url":"'+window.location.pathname+'"}')
                    } else if(to.fullPath.indexOf('blog')>0){
                        connection.send('{"command":"front_blog","url":"'+window.location.pathname+'"}')
                    }
                }
                connection.onmessage = function(event) {
                    let data = JSON.parse(event.data);
                    if(data.message === 'front_shop') {
                        document.querySelector('meta[name="description"]').setAttribute("content", "" + data.seo.description + "");
                        document.querySelector('head title').textContent = data.seo.title;
                        data.shop.data.map((item) => {
                            let new_sale = '<div class="ribbon ribbon-blue"></div>';
                            if (item.new === 1){
                                new_sale = '<div class="ribbon ribbon-blue"><div class="banner">' +
                                    '<div class="text">New</div>' +
                                    '</div>' +
                                    '</div>';
                            }
                            if (item.sale === 1){
                                new_sale = '<div class="ribbon ribbon-blue"><div class="banner" style="text-align: center">' +
                                    '<div class="sale" style="margin-top: -13px;font-size: 20px;">-'+item.percent+'%</div>' +
                                    '</div>' +
                                    '</div>';
                            }
                            let description;
                            if(item.description.length < 100){
                                description = item.description;
                            } else {
                                description = item.description.substr(0,100) + '...';
                            }
                            let img;
                            if(item.img == null){
                                img = 'http://placehold.it/270x200'
                            } else {
                                img = '/front/img/shop/'+item.img;
                            }
                            let sale_price = Math.round(((item.price + (item.sub_price /100)) - ((item.price + (item.sub_price /100))*item.percent/100)) * 100) / 100;
                            document.getElementById('products').innerHTML += '<li class="product">' +
                                '<div class="picture">' + new_sale +
                                '<img src="'+img+'" data-at2x="'+img+'" alt="">' +
                                '<span class="hover-effect"></span>' +
                                '<div class="link-cont">' +
                                '<a href="http://placehold.it/270x200" class="cws-right cws-slide-left "><i class="fa fa-search"></i></a>' +
                                '<a href="shop-single-product.html" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>' +
                                '</div>' +
                                '</div>' +
                                '<div class="product-name">' +
                                '<a href="shop-single-product.html">'+item.name+'</a>' +
                                '</div>' +
                                '<div class="star-rating" title="Rated 4.00 out of 5">' +
                                '<span style="width:60%"><strong class="rating">4.00</strong> out of 5</span>' +
                                '</div>' +
                                '<span class="price">' +
                                '<span class="amount">'+sale_price+'&#32;<sup><del>'+item.price+'.'+item.sub_price+'</del></sup>&#8381;</span>' +
                                '</span>' +
                                '<div class="product-description">' +
                                '<div class="short-description">' +
                                '<p>'+description+'</p>' +
                                '</div>' +
                                '</div>' +
                                '<a href="shop-cart.html" rel="nofollow" data-product_id="70" data-product_sku="" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> В корзину</a>' +
                                '</li>';
                        });
                        let paginate_item = document.getElementById('paginate_item');
                        data.shop.path = window.location.protocol +'//'+window.location.hostname;
                        data.shop.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                        data.shop.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.shop.last_page;
                        data.shop.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.shop.from+1);
                        if(data.shop.links.length >3){
                            data.shop.links.map((items) => {
                                let link = items.label;
                                let active = '';
                                let url = items.url;
                                if(items.active){
                                    active = 'class="active"';
                                }
                                if(url === null){
                                    url = '/blog';
                                } else {
                                    if(items.label === 'Next &raquo;'){
                                        url = data.shop.last_page_url;
                                    } else {
                                        url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+items.label;
                                    }
                                }
                                if(items.label === '&laquo; Previous'){
                                    link = '<i class="fa fa-angle-double-left"></i>'
                                }
                                if(items.label === 'Next &raquo;'){
                                    link = '<i class="fa fa-angle-double-right"></i>'
                                }
                                paginate_item.innerHTML += '<a href="'+url+'" '+active+'>'+link+'</a>'
                            });
                        }
                    }
                    else if(data.message === 'front_blog_article'){
                        document.querySelector('meta[name="description"]').setAttribute("content", ""+data.seo.description+"");
                        document.querySelector('head title').textContent = data.seo.title;
                        let blog_article = document.getElementById('blog_article');
                        let comments = document.getElementById('comments');
                        let last_news = document.getElementById('last_news');
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
                            let tags;
                            if(item.tags.length > 1){
                                if(item.tags.indexOf(';') >0){
                                    tags = item.tags.split(';');
                                }
                                let k = 0;
                                data.blog_tags.map((i) => {
                                    if(i.id == tags[k]){
                                        tags_post.innerHTML += '<a href="#"><i class="'+i.icon+'"></i>'+i.name+'</a>';
                                    }
                                    k++
                                });
                            }

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

                        data.last_news.map((item) => {
                            last_news.innerHTML += '<li class="cat-item cat-item-1 current-cat"><a href="/blog/article/'+item.id+'">'+item.title+'</a></li>';
                        });
                        let blog_tags = document.getElementById('blog_tags');
                        data.blog_tags.map((item) => {
                            blog_tags.innerHTML += '<a href="#" rel="tag">'+item.name+'</a> ';
                        });
                    }
                    else if(data.message === 'blog_comment_add'){
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
                    }
                    else if(data.message === 'front_blog'){
                        document.getElementById('blog_items').innerHTML = '';
                        data.seo.map((item) => {
                            document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                            document.querySelector('head title').textContent = item.title;
                        });
                        data.blog.data.map((item) => {
                            let date = new Date(item.created_at);
                            let hour = date.getHours();
                            let minute = date.getMinutes();
                            let mounth = date.getMonth();
                            if(mounth === 1){mounth = 'Января'}
                            if(mounth === 2){mounth = 'Февраля'}
                            if(mounth === 3){mounth = 'Марта'}
                            if(mounth === 4){mounth = 'Апреля'}
                            if(mounth === 5){mounth = 'Мая'}
                            if(mounth === 6){mounth = 'Июнь'}
                            if(mounth === 7){mounth = 'Июля'}
                            if(mounth === 8){mounth = 'Августа'}
                            if(mounth === 9){mounth = 'Сентября'}
                            if(mounth === 10){mounth = 'Октября'}
                            if(mounth === 11){mounth = 'Ноября'}
                            if(mounth === 12){mounth = 'Декабря'}
                            let day = date.getDate();
                            let brief = '';
                            let div = document.createElement('div');
                            if(item.description != null){
                                div.innerText = item.description;
                                brief = div.innerText.replace( /(<([^>]+)>)/ig, '');
                                brief = brief.substr(0,100);
                            }
                            document.getElementById('blog_items').innerHTML += '<div class="grid-col grid-col-4" style="margin-bottom: 10px">' +
                                '<div class="course-item">' +
                                '<div class="course-hover">' +
                                '<img src="'+item.img+'" alt>' +
                                '<div class="hover-bg bg-color-1"></div>' +
                                '<a href="/blog/' + item.id + '">Читать подробнее</a>' +
                                '</div>' +
                                '<div class="course-name clear-fix">' +
                                '<h3><a href="/blog/' + item.id + '">'+item.title+'</a></h3>' +
                                '</div>' +
                                '<div class="course-date bg-color-1 clear-fix">' +
                                '<div class="day"><i class="fa fa-calendar"></i>'+day+' '+mounth+'</div><div class="time"><i class="fa fa-clock-o"></i>В '+hour+':'+minute+'</div>' +
                                '<div class="divider"></div>' +
                                '<div class="description">'+brief+'...</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        });
                        let paginate_item = document.getElementById('paginate_item');
                        data.blog.path = window.location.protocol +'//'+window.location.hostname;
                        data.blog.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                        data.blog.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.blog.last_page;
                        data.blog.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.blog.from+1);
                        if(data.blog.links.length >3){
                            data.blog.links.map((items) => {
                                let link = items.label;
                                let active = '';
                                let url = items.url;
                                if(items.active){
                                    active = 'class="active"';
                                }
                                if(url === null){
                                    url = '/blog';
                                } else {
                                    if(items.label === 'Next &raquo;'){
                                        url = data.blog.last_page_url;
                                    } else {
                                        url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+items.label;
                                    }
                                }
                                if(items.label === '&laquo; Previous'){
                                    link = '<i class="fa fa-angle-double-left"></i>'
                                }
                                if(items.label === 'Next &raquo;'){
                                    link = '<i class="fa fa-angle-double-right"></i>'
                                }
                                paginate_item.innerHTML += '<a href="'+url+'" '+active+'>'+link+'</a>'
                            });
                        }
                    }
                    else if('message' === "search_blog"){

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
            }
        },
        mounted() {

        },
        created() {

        },
    }
</script>

<template>
    <footer>
        <div class="grid-row">
            <div class="grid-col-row clear-fix">
                <section class="grid-col grid-col-4 footer-about">
                    <h2 class="corner-radius">Контакты</h2>
                    <div v-for="item in data.quotes_footer">
                        <h3>{{ item.author }}</h3>
                        <p>{{ item.quotes }}</p>
                    </div>
                    <address>
                        <p></p>
                        <a href="tel:+79687106270" class="phone-number">+79687106270</a>
                        <br />
                        <a href="mailto:uni@domain.com" class="email">uni@domain.com</a>
                        <br />
                        <a href="www.sample.com" class="site">www.sample.com</a>
                    </address>
                    <div class="footer-social">
                        <a href="https://wa.me/79687106270" class="fa fa-phone"></a>
                        <a href="https://github.com/FeralBerry" class="fa fa-github"></a>
                        <a href="mailto:pusiket90@yandex.ru" class="fa fa-envelope-o"></a>
                        <a href="" class="fa fa-youtube"></a>
                    </div>
                </section>
                <section class="grid-col grid-col-4 footer-latest">
                    <h2 class="corner-radius">Последние новости</h2>
                    <div v-html="this.footer_blog"></div>

                </section>
                <section class="grid-col grid-col-4 footer-contact-form">
                    <h2 class="corner-radius">Написать предложение</h2>
                    <div class="email_server_responce"></div>
                        <p><span class="your-name"><input type="text" name="name" id="footer_name" value="" size="40" placeholder="Name" aria-invalid="false" required></span>
                        </p>
                        <span style="display: none;color: red" id="footer_name_error">Имя не может быть меньше 3 и не больше 255 символов.</span>
                        <p><span class="your-email"><input type="text" name="phone" id="footer_phone" value="" size="40" placeholder="Phone" aria-invalid="false" required></span> </p>
                    <span style="display: none;color: red" id="footer_phone_error">Телефон или Email не должны превышать 50 символов</span>
                    <p><span class="your-message"><textarea name="message" id="footer_message" placeholder="Comments" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
                    <span style="display: none;color: red" id="footer_message_error">Сообщение должно быть не менее 3 символов</span>
                    <span style="display: none;color: greenyellow" id="footer_success">Сообщение успешно отправленно</span>
                    <a @click="send_footer_contact()" class="cws-button bt-color-3 border-radius alt icon-right" style="color:#fff">Отправить <i class="fa fa-angle-right"></i></a>
                </section>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="grid-row clear-fix">
                <div class="copyright"><router-link to="https:\\easy-script.io">Easy-Script.io</router-link><span></span> 2020 . All Rights Reserved</div>
                <nav class="footer-nav">
                    <ul class="clear-fix">
                        <li>
                            <router-link to="/">Главная</router-link>
                        </li>
                        <li>
                            <router-link to="/blog">Блог</router-link>
                        </li>
                        <li>
                            <router-link to="/shop">Магазин</router-link>
                        </li>
                        <li>
                            <router-link to="/contact">Контакты</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        name: "FooterComponent",
        props: ['data'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                footer_blog:'',
                connection:new WebSocket('ws://' + process.env.MIX_WSS_URL),
                user_id:$('meta[name=user_id]').attr('content'),
            }
        },
        watch: {
            '$route' (to, from) {
                let protocol = 'ws://';
                if (window.location.protocol === 'https:') {
                    protocol = 'wss://';
                }
                let wsUri = protocol+ process.env.MIX_WSS_URL;
                let connection = new WebSocket(wsUri);
                this.connection = connection;
                connection.onopen = function(event){
                    connection.send('{"command":"cart"}')
                    if(to.fullPath.indexOf('shop')>0){
                        document.getElementById('products').innerHTML = "";
                        connection.send('{"command":"front_shop","url":"'+window.location.pathname+'"}')
                    } else if(to.fullPath.indexOf('blog/article')>0){
                        connection.send('{"command":"front_blog_article","url":"'+window.location.pathname+'"}')
                    } else if(to.fullPath.indexOf('blog')>0){
                        connection.send('{"command":"front_blog","url":"'+window.location.pathname+'"}')
                    } else if(window.location.origin + '/' === window.location.href){
                        connection.send('{"command":"front_index"}')
                    } else if(to.fullPath.indexOf('cart')>0){
                        connection.send('{"command":"front_cart"}')
                    }
                }
                connection.onmessage = function(event) {
                    let data = JSON.parse(event.data);
                    if (data) {
                        if(data.navigate === 'front_navigate'){

                        }
                        if(data.cart === 'cart'){
                            let cart = document.getElementById('cart');
                            if(data.users_cart != null){
                                cart.style.display = 'block';
                                cart.innerHTML = '';
                                let cart_price;
                                let cart_price_with_percent;
                                if(data.cart_price == 0){
                                    cart_price = 0;
                                    cart_price_with_percent = 0;
                                } else {
                                    cart_price = data.cart_price;
                                    cart_price_with_percent = data.cart_price_with_percent;
                                }
                                data.users_cart.map((item) => {
                                    let price = Math.round(((item.price + (item.sub_price/100)) - (item.price + (item.sub_price/100)) *item.percent/100) * 100) / 100;
                                    cart.innerHTML += '<li class="cart row" style="padding: 10px"><div class="col-md-3" style="background-image: url(/front/img/shop/'+item.img+');background-size: cover"></div>' +
                                        '                                        <div class="col-md-8">' +
                                        '                                            <p><span class="cart_item_title">'+item.name+'</span></p>' +
                                        '                                            <span class="price"><span class="amount">'+price+' <sup><del>'+item.price+'.'+item.sub_price+'</del></sup>₽</span></span>' +
                                        '                                        </div>' +
                                        '                                        <div class="col-md-1">' +
                                        '                                            <span class="del_cart" onclick="delete_cart('+item.id+')"><i class="fa fa-times" aria-hidden="true"></i></span>' +
                                        '                                        </div></li>';
                                });
                                cart.innerHTML += '<li>Стоимость покупок: '+cart_price_with_percent+'<del><sup>'+cart_price+'</sup></del>&#8381;</li>'+
                                    '<li>' +
                                    '                            <a href="/cart" rel="nofollow" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> В корзину</a>' +
                                    '                        </li>';
                            }
                            if(data.users_cart === undefined || data.users_cart.length === 0) {
                                cart.innerHTML = '<li class="cart row" style="padding: 10px"><h3>Пока корзина пуста</h3></li>';
                            }
                        }
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
                                let link = '<a id="cart_'+item.id+'" rel="nofollow" class="add_to_cart cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> В корзину</a>';
                                let sale_price = Math.round(((item.price + (item.sub_price /100)) - ((item.price + (item.sub_price /100))*item.percent/100)) * 100) / 100;
                                data.users_cart.map((items) => {
                                    if(items.shop_id == item.id){
                                        link = '<a onclick="javascript: void(0)" rel="nofollow" class="add_to_cart cws-button border-radius icon-left bt-color-6"> <i class="fa fa-shopping-cart"></i> Добавлен</a>';
                                    }
                                });
                                let rating_width = item.rating * 100 / 5;
                                document.getElementById('products').innerHTML += '<li class="product">' +
                                    '<div class="picture">' + new_sale +
                                    '<img src="'+img+'" data-at2x="'+img+'" alt="">' +
                                    '<span class="hover-effect"></span>' +
                                    '<div class="link-cont">' +
                                    '<a href="https://placehold.it/270x200" class="cws-right cws-slide-left "><i class="fa fa-search"></i></a>' +
                                    '<a href="/shop/product/'+item.id+'" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="product-name">' +
                                    '<a href="shop-single-product.html">'+item.name+'</a>' +
                                    '</div>' +
                                    '<div class="star-rating" >' +
                                    '<a class="shop_rating" data_rating="1" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -98px;position:absolute;width: 24px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="2" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -76px;position:absolute;width: 22px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="3" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -57px;position:absolute;width: 20px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="4" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -39px;position:absolute;width: 20px;height: 24px"</a>' +
                                    '<a class="shop_rating" data_rating="5" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -20px;position:absolute;width: 24px;height: 24px"></a>' +
                                    '<span id="rating_width_'+item.id+'" style="width:'+rating_width+'%">' +
                                    '</div>' +
                                    '<span class="price">' +
                                    '<span class="amount">'+sale_price+'&#32;<sup><del>'+item.price+'.'+item.sub_price+'</del></sup>&#8381;</span>' +
                                    '</span>' +
                                    '<div class="product-description">' +
                                    '<div class="short-description">' +
                                    '<p>'+description+'</p>' +
                                    '</div>' +
                                    '</div>' + link +
                                    '</li>';
                            });
                            let shop_category_link = document.getElementById('shop_category_link');

                            shop_category_link.innerHTML = '';
                            data.navigate.map((item) => {
                                if(item.href.indexOf('/shop/')>=0){
                                    shop_category_link.innerHTML += '<li class="cat-item cat-item-1 current-cat"><a href="'+item.href+'">'+item.title+'<span></span></a></li>';
                                }
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
                        else if(data.message === 'front_index'){

                        }
                        else if(data.message === "search_blog"){
                            document.getElementById('blog_items').innerHTML = '';
                            data.blog_search.data.map((item) => {
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
                            paginate_item.innerHTML = '';
                            data.blog_search.path = window.location.protocol +'//'+window.location.hostname;
                            data.blog_search.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                            data.blog_search.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.blog.last_page;
                            data.blog_search.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.blog.from+1);
                            if(data.blog_search.links.length >3){
                                data.blog_search.links.map((items) => {
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
                        else if(data.message === 'shop_search'){
                            document.getElementById('products').innerHTML = '';
                            console.log(data.shop_search)
                            data.shop_search.data.map((item) => {
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
                                let link = '<a id="cart_'+item.id+'" rel="nofollow" class="add_to_cart cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> В корзину</a>';
                                let sale_price = Math.round(((item.price + (item.sub_price /100)) - ((item.price + (item.sub_price /100))*item.percent/100)) * 100) / 100;
                                let rating_width = item.rating * 100 / 5;
                                document.getElementById('products').innerHTML += '<li class="product">' +
                                    '<div class="picture">' + new_sale +
                                    '<img src="'+img+'" data-at2x="'+img+'" alt="">' +
                                    '<span class="hover-effect"></span>' +
                                    '<div class="link-cont">' +
                                    '<a href="https://placehold.it/270x200" class="cws-right cws-slide-left "><i class="fa fa-search"></i></a>' +
                                    '<a href="/shop/product/'+item.id+'" class=" cws-left cws-slide-right"><i class="fa fa-link"></i></a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="product-name">' +
                                    '<a href="shop-single-product.html">'+item.name+'</a>' +
                                    '</div>' +
                                    '<div class="star-rating" >' +
                                    '<a class="shop_rating" data_rating="1" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -98px;position:absolute;width: 24px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="2" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -76px;position:absolute;width: 22px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="3" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -57px;position:absolute;width: 20px;height: 24px"></a>' +
                                    '<a class="shop_rating" data_rating="4" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -39px;position:absolute;width: 20px;height: 24px"</a>' +
                                    '<a class="shop_rating" data_rating="5" data_shop_id="'+item.id+'" style="z-index:10;margin-left: -20px;position:absolute;width: 24px;height: 24px"></a>' +
                                    '<span id="rating_width_'+item.id+'" style="width:'+rating_width+'%">' +
                                    '</div>' +
                                    '<span class="price">' +
                                    '<span class="amount">'+sale_price+'&#32;<sup><del>'+item.price+'.'+item.sub_price+'</del></sup>&#8381;</span>' +
                                    '</span>' +
                                    '<div class="product-description">' +
                                    '<div class="short-description">' +
                                    '<p>'+description+'</p>' +
                                    '</div>' +
                                    '</div>' + link +
                                    '</li>';
                            });
                            let paginate_item = document.getElementById('paginate_item');
                            data.shop_search.path = window.location.protocol +'//'+window.location.hostname;
                            data.shop_search.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                            data.shop_search.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.shop.last_page;
                            data.shop_search.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.shop.from+1);
                            if(data.shop_search.links.length >3){
                                data.shop_search.links.map((items) => {
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
                        else if(data.message === 'blog_search'){

                        }
                        else if(data.message === "front_cart"){
                            let cart_produts = document.getElementById('cart_products');
                            cart_produts.innerHTML = '';
                            let i = 0;
                            let cart_price = 0;
                            let cart_price_with_percent = 0;
                            if(data.users_cart.length > 0){
                                data.users_cart.map((item) => {
                                    i++;
                                    let price = Math.round(((item.price + (item.sub_price/100)) - (item.price + (item.sub_price/100)) *item.percent/100) * 100) / 100;
                                    cart_produts.innerHTML += '<div class="col-md-1 cart_table_item">'+i+'</div>' +
                                        '<div class="col-md-8 cart_table_item" style="float: left">' +
                                        '<div class="row">' +
                                        '<div class="col-md-3">' +
                                        '<a href="/product/'+item.id+'">' +
                                        '<img width="100%" src="/front/img/shop/'+item.img+'" data-at2x="/front/img/shop/'+item.img+'" class="attachment-shop_thumbnail wp-post-image" alt="">' +
                                        '</a>' +
                                        '</div>' +
                                        '<div class="col-md-9">' +
                                        '<a href="/product/'+item.id+'">'+item.name+' </a>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-md-2 cart_table_item"><span class="amount">'+price+'<del><sup>'+item.price+'.'+item.sub_price+'</sup></del> <sup>&#8381;</sup></span></div>' +
                                        '<div class="col-md-1 cart_table_item"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

                                });
                            } else{
                                cart_produts.innerHTML = '<div class="col-md-12 cart_table_item">Пока Ваша корзина пуста</div>';
                            }
                            if(data.cart_price_with_percent == 0){
                                document.getElementById('cart_price').innerHTML = '<div class="col-md-9">Стоимоть:</div>' +
                                    '                            <div class="col-md-3">0&#8381;</div>'
                            } else {
                                cart_price = data.cart_price;
                                cart_price_with_percent = data.cart_price_with_percent;
                                document.getElementById('cart_price').innerHTML = '<div class="col-md-9">Стоимоть:</div>' +
                                    '                            <div class="col-md-3">'+cart_price_with_percent+'<del><sup>'+cart_price+'</sup></del>&#8381;</div>'
                            }

                        }
                        else if(data.message === 'new_shop_rating'){
                            let rating_width = document.getElementById('rating_width_'+data.shop_id+'')
                                rating_width.setAttribute('style','width:'+data.rating+'%!important');
                        }
                    }
                }
                $('body').on('click', '#send_comment', function() {
                    if ($('meta[name=user_id]').attr('content')) {
                        let blog_id = document.getElementById('blog_id').value;
                        let message = document.getElementById('message').value;
                        connection.send('{"command":"blog_comment_add","user_id":"' + this.user_id + '","blog_id":"' + blog_id + '","message":"' + message + '"}');
                    } else {
                        alert('Для добавления комментария нужно авторизоваться!')
                    }
                });
                $('body').on('submit', '#shop_search', function(event) {
                    event.preventDefault()
                    let shop_search_input = document.getElementById('shop_search_input').value;
                    connection.send('{"command":"shop_search","shop_search_input":"' + shop_search_input + '"}');
                });
                $('body').on('submit', '#blog_search', function(event) {
                    event.preventDefault()
                    let blog_search_input = document.getElementById('blog_search_input').value;
                    connection.send('{"command":"blog_search","blog_search_input":"' + blog_search_input + '"}');
                });
            }
        },
        mounted() {

        },
        created() {
            let protocol = 'ws://';
            if (window.location.protocol === 'https:') {
                protocol = 'wss://';
            }
            let wsUri = protocol+ process.env.MIX_WSS_URL;
            let connection = new WebSocket(wsUri);
            this.connection = connection;
            $('body').on('click', '.add_to_cart',function(){
                this.href = 'javascript: void(0)';
                this.classList.remove('alt');
                this.classList.add('bt-color-6');
                this.innerHTML = ' <i class="fa fa-shopping-cart"></i> Добавлен'
                connection.send('{"command":"add_to_cart","user_id":"' + this.user_id + '","product_id":"' + $(this).attr('id') + '"}');
            });
            $('body').on('click','.shop_rating', function (){
                if(this.user_id == null && this.user_id == ''){
                    alert('Для добавления голоса за товар нужно авторизоваться!');
                } else {
                    connection.send('{"command":"shop_rating","shop_id":"'+$(this).attr('data_shop_id')+'","rating":"'+$(this).attr('data_rating')+'","user_id":"'+$('meta[name=user_id]').attr('content')+'"}');
                }
            });
            this.data.footer_blog.map((item) => {
                let brief = '';
                let div = document.createElement('div');
                if(item.description != null){
                    div.innerText = item.description;
                    brief = div.innerText.replace( /(<([^>]+)>)/ig, '');
                    brief = brief.substr(0,100);
                }
                let date = new Date(item.created_at);
                let hour = date.getHours();
                let minute = date.getMinutes();
                let year = date.getFullYear();
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
                this.footer_blog += '<article><h3><a class="footer_blog" href="/blog/'+item.id+'">'+item.title+'</a></h3>' +
                    '<div class="course-date">' +
                    '   <div>'+hour+'<sup>'+minute+'</sup></div>' +
                    '   <div>'+day+' '+mounth+' '+year+'</div>' +
                    '</div>' +
                    '<p>'+brief+'...</p>' +
                    '</article>';
            });
            connection.onmessage = function(event) {
                let data = JSON.parse(event.data);
                let cart = document.getElementById('cart');
                if(data.message === 'add_to_cart'){
                    cart.innerHTML = '';
                    cart.style.display = 'block';
                    data.users_cart.map((item) => {
                        let price = (item.price +item.sub_price/100) - (item.percent/100)*(item.price + item.sub_price/100);
                        cart.innerHTML += '<li class="cart row" style="padding: 10px"><div class="col-md-3" style="background-image: url(/front/img/shop/'+item.img+');background-size: cover"></div>' +
                            '                                        <div class="col-md-8">' +
                            '                                            <p><span class="cart_item_title">'+item.name+'</span></p>' +
                            '                                            <span class="price"><span class="amount">'+price+' <sup><del>'+item.price+'.'+item.sub_price+'</del></sup>₽</span></span>' +
                            '                                        </div>' +
                            '                                        <div class="col-md-1">' +
                            '                                            <span class="del_cart" onclick="delete_cart('+item.id+')"><i class="fa fa-times" aria-hidden="true"></i></span>' +
                            '                                        </div></li>';
                    });
                    cart.innerHTML += '<li>' +
                        '                            <a href="/cart" rel="nofollow" class="cws-button border-radius icon-left alt"> <i class="fa fa-shopping-cart"></i> В корзину</a>' +
                        '                        </li>'
                } else if(data.message === 'footer_name_error'){
                    let footer_name_error = document.getElementById('footer_name_error');
                    footer_name_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_name_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_phone_error'){
                    let footer_phone_error = document.getElementById('footer_phone_error');
                    footer_phone_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_phone_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_message_error'){
                    let footer_message_error = document.getElementById('footer_message_error');
                    footer_message_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_message_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_success'){
                    let footer_success = document.getElementById('footer_success');
                    footer_success.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_success').fadeOut('fast');
                    }, 5000);
                }
            }
        },
        methods:{
            send_footer_contact(){
                let footer_name = document.getElementById('footer_name').value;
                let footer_phone = document.getElementById('footer_phone').value;
                let footer_message = document.getElementById('footer_message').value;
                this.connection.send('{"command":"front_footer_message","footer_name":"'+footer_name+'","footer_phone":"'+footer_phone+'","footer_message":"'+footer_message+'"}');
            },
        },
    }
</script>

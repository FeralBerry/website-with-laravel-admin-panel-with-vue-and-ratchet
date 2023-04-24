<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
    $seo_description = '';
    $title = '';
    foreach ($data['seo'] as $item){
        if($url == $item->url){
            $seo_description = $item->description;
            $title = $item->title;
        }
    }
    ?>
    <meta name="description" content="{{ $seo_description }}">
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="cookie_id" content="">
    @if(Auth::user())
        <meta name="user_id" content="{{ Auth::id() }}">
    @else
        <meta name="user_id" content="">
    @endif
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fi/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/tuner/css/colorpicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/tuner/css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v-{{ $data['version'] }}">
</head>
<body>
<div id="app">
    <header-component :data='{!! json_encode($data) !!}'></header-component>
    <router-view :data='{!! json_encode($data) !!}'></router-view>
    <footer-component :data='{!! json_encode($data) !!}'></footer-component>
</div>
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script type='text/javascript' src='{{ asset('front/js/jquery.validate.min.js') }}'></script>
<script src="{{ asset('front/js/jquery.form.min.js') }}"></script>
<script src="{{ asset('front/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('front/js/jflickrfeed.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.tweet.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/tuner/js/colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/tuner/js/scripts.js') }}"></script>
<script src="{{ asset('front/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('front/js/jquery.fancybox-media.js') }}"></script>


<script>
    let about = document.getElementById('about');
    function service_menu(id){
        let icon_wrench = document.getElementById('icon-wrench');
        let icon_tachometer = document.getElementById('icon-tachometer');
        let icon_website = document.getElementById('icon-website');
        let icon_programming = document.getElementById('icon-programming');
        let icon_camera = document.getElementById('icon-camera');
        let icon_speech = document.getElementById('icon-speech');
        let icon_sitemap = document.getElementById('icon-sitemap');
        let icon_terminal = document.getElementById('icon-terminal');
        icon_wrench.classList.remove('active');
        icon_tachometer.classList.remove('active');
        icon_website.classList.remove('active');
        icon_programming.classList.remove('active');
        icon_camera.classList.remove('active');
        icon_speech.classList.remove('active');
        icon_sitemap.classList.remove('active');
        icon_terminal.classList.remove('active');
        let about = document.getElementById('about');
        if(id === 1){
            icon_wrench.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>О сервисе</h2>' +
                '<p>Сервис предназначен для обучения программирования, есть как платные, так и бесплатные курсы. Во время обучения вы сможите изучить интересующий Вас курс, создать набор скриптов и создать первый свой сайт с применением современных технологий.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 2){
            icon_tachometer.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Скорость взаимодействия</h2>' +
                '<p>Сервис построен на современных технологиях VUE.js и Ratchet, что позволяет ускорить взаимодействия с ним, и уменьшить нагрузку на Ваше устройство.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 3){
            icon_website.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Быстрое создание сайта</h2>' +
                '<p>Изучение популярных CMS и фреймворков, которые позволяют ускорить создание сайта и сделать форматирование сайта очень быстрым.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 4){
            icon_programming.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Наработка скриптов</h2>' +
                '<p>После обучения у Вас будут созданы скрипты, которые потом сможите использовать при работе. Все скрипты будут разобраны и вы будете знать как их можно менять под определенные задачи.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 5){
            icon_camera.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Видео уроки</h2>' +
                '<p>На сайте Вы найдёте видео уроки, которые сможите просмотреть и пересмотреть с нужного момента, если было не понятно с 1 раза.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 6){
            icon_speech.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Задать вопрос</h2>' +
                '<p>В платных уроках Вы всегда сможите задать вопрос и получить максимально подробный ответ. Так же доступен чат с другими учениками.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 7){
            icon_sitemap.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Удобное ориентирование на сайте</h2>' +
                '<p>Сайт сделан с максимально отзывчивым интерфейсом. Для максимального удобства в пользовании.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
        if(id === 8){
            icon_terminal.classList.add('active');
            about.innerHTML = '';
            about.innerHTML = '<h2>Работа с кодом прям на сайте</h2>' +
                '<p>Разработана структура работы с кодом на прямую на сайте, для выполения заданий не надо иметь никаких программ. Так же разработана автоматическая проверка задания.</p>' +
                '<a href="/register" class="cws-button bt-color-3 border-radius alt icon-right float-right">Зарегистрироваться<i class="fa fa-angle-right"></i></a>';
        }
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function blog_search(){
        let search = document.getElementById('search').value;
        $.ajax({
            async: true,
            type: "POST",
            url: '/blog/search/'+search,
            data: {
            },
            contentType: false,
            cache : false,
            processData: false,
            success: function(data){
                let main_blog_article = document.getElementById('main_blog_article');
                main_blog_article.innerHTML = '';
                if(main_blog_article.length == 0){
                    main_blog_article.innerHTML = 'Ничего не найдено!';
                } else {
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
                        main_blog_article.innerHTML += '<div class="grid-col grid-col-4" style="margin-bottom: 10px">' +
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
                    data.blog_search.path = window.location.protocol +'//'+window.location.hostname;
                    data.blog_search.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                    data.blog_search.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.blog_search.last_page;
                    data.blog_search.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.blog_search.from+1);
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
                                    url = data.blog_search.last_page_url;
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
            }
        });
    }
    function delete_cart(id){
        $.ajax({
            async: true,
            type: "POST",
            url: '/shop/product/delete/' + id + '/' + $('meta[name="cookie_id"]').attr('content'),
            data: {

            },
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                return confirm("Точно нужно удалить из корзины!");
            },
            success: function (data) {
                $('#cart').html('');
                let cart = document.getElementById('cart');
                if(data.users_cart != null){
                    cart.style.display = 'block';
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
                            '                                            <span class="del_cart" onclick="return confirm(`Точно нужно удалить из корзины!`) delete_cart('+item.id+')"><i class="fa fa-times" aria-hidden="true"></i></span>' +
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
                if('{{ Route::currentRouteName() }}' === 'front-shop') {
                    let cart_button = $('#cart_' + id);
                    cart_button.html("<i class='fa fa-shopping-cart'></i> В корзину") ;
                    cart_button.attr("href", "#");
                    cart_button.addClass('alt');
                    cart_button.removeClass('bt-color-6');
                }
                if('{{ Route::currentRouteName() }}' === 'front-shop-cart'){
                    $('#cart_products').html("");
                    let cart_products = document.getElementById('cart_products');
                    let i = 0;
                    let cart_price = 0;
                    let cart_price_with_percent = 0;
                    if(data.users_cart.length > 0){
                        data.users_cart.map((item) => {
                            i++;
                            let price = Math.round(((item.price + (item.sub_price/100)) - (item.price + (item.sub_price/100)) *item.percent/100) * 100) / 100;
                            cart_products.innerHTML += '<div id="cart_product_'+item.id+'" class="col-md-1 cart_table_item">'+i+'</div>' +
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
                                '<div class="col-md-1 cart_table_item"><a onclick="return confirm(`Точно нужно удалить из корзины!`) delete_cart('+item.id+')"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

                        });
                    } else {
                        cart_products.innerHTML = '<div class="col-md-12 cart_table_item">Пока Ваша корзина пуста</div>';
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
            },
        });
    }
</script>

<script src="{{ asset('js/app.js') }}?v-{{ $data['version'] }}"></script>

</body>
</html>

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
    @if(Auth::user())
        <meta name="user_id" content="{{ Auth::id() }}">
    @else
        <meta name="user_id" content="">
    @endif
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fi/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/tuner/css/colorpicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/tuner/css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.fancybox.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
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
<script src="{{ asset('front/js/retina.min.js') }}"></script>
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
</script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

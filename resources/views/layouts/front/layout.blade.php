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
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

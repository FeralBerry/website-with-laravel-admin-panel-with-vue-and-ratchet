<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>aside - Bootstrap 4 web application</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{ Auth::id() }}">
    @include('layouts.back.up_config')
</head>
<body>
<div class="app" id="app">
    <div id="aside" class="app-aside fade nav-dropdown black">
        <!-- fluid app aside -->
        <div class="navside dk" data-layout="column">
            <left-bar-component></left-bar-component>
        </div>
    </div>
    <!-- content -->
    <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
        <div class="app-header white bg b-b">
            <back-header-component></back-header-component>
        </div>
        <div class="app-footer white bg p-a b-t">
            <footer-component></footer-component>
        </div>
        <div class="app-body">
            <router-view :data='{!! json_encode($data) !!}'></router-view>
        </div>
    </div>
    <!-- / -->
    {{--<!-- ############ SWITHCHER START-->
    <div id="switcher">
        <div class="switcher dark-white" id="sw-theme">
            <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="dark-white sw-btn">
                <i class="fa fa-gear text-muted"></i>
            </a>
            <div class="box-header">
                <a href="https://themeforest.net/item/aside-dashboard-ui-kit/17903768?ref=flatfull" class="btn btn-xs rounded danger pull-right">BUY</a>
                <strong>Theme Switcher</strong>
            </div>
            <div class="box-divider"></div>
            <div class="box-body">
                <p id="settingLayout" class="hidden-md-down">
                    <label class="md-check m-y-xs" data-target="folded">
                        <input type="checkbox">
                        <i></i>
                        <span>Folded Aside</span>
                    </label>
                    <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
                        <span class="fa fa-expand fa-fw m-r-xs"></span>
                        <span>Fullscreen Mode</span>
                    </label>
                </p>
                <p>Colors:</p>
                <p data-target="color">
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="primary">
                        <i class="primary"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="accent">
                        <i class="accent"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="warn">
                        <i class="warn"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="success">
                        <i class="success"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="info">
                        <i class="info"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="warning">
                        <i class="warning"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
                        <input type="radio" name="color" value="danger">
                        <i class="danger"></i>
                    </label>
                </p>
                <p>Themes:</p>
                <div data-target="bg" class="clearfix">
                    <label class="radio radio-inline m-a-0 ui-check ui-check-lg">
                        <input type="radio" name="theme" value="">
                        <i class="light"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
                        <input type="radio" name="theme" value="grey">
                        <i class="grey"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
                        <input type="radio" name="theme" value="dark">
                        <i class="dark"></i>
                    </label>
                    <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
                        <input type="radio" name="theme" value="black">
                        <i class="black"></i>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ SWITHCHER END-->--}}

    <!-- ############ LAYOUT END-->
    <web-socket-component></web-socket-component>
</div>

@include('layouts.back.down_config')
<script src="{{ asset('js/backapp.js') }}"></script>
</body>
</html>

<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="box text-center">
                            <!--<div class="box-tool">
                                <ul class="nav">
                                    <li class="nav-item inline dropdown">
                                        <a class="nav-link text-muted" data-toggle="dropdown">
                                            <i class="material-icons md-18">menu</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-scale pull-right dark">
                                            <a class="dropdown-item" href="#">Activities</a>
                                            <a class="dropdown-item" href="#">Feed</a>
                                            <a class="dropdown-item" href="#">Photo</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item">Follow</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>-->
                            <template v-for="courses_name in data.free_courses_name">
                                <div style="background: transparent;padding: 0;margin-top: 10px">
                                    <img :src="courses_name.img" style="margin-left:-50%;margin-top:-20px;position: absolute;width: 100%;z-index: 0">
                                    <div style="position:absolute;z-index: 100;background: rgba(255,255,255,0.9);padding: 1.5rem">
                                        <router-link :to="courses_name.link" class="text-md block">{{ courses_name.title }}</router-link>
                                        <p><small>{{ courses_name.brief }}</small></p>
                                        <router-link :to="courses_name.link" class="btn btn-sm btn-outline rounded b-accent">Начать</router-link>
                                    </div>
                                </div>
                                <div class="row row-col no-gutter b-t warn" style="position:absolute;z-index: 100;top:160px">
                                    <div class="col-xs-4 b-r">
                                        <a class="p-y block text-center" data-ui-toggle-class>
                                            <strong class="block">{{ courses_name.count_article }}</strong>
                                            <span class="block">Уроков</span>
                                        </a>
                                    </div>
                                    <div class="col-xs-4 b-r">
                                        <a class="p-y block text-center" data-ui-toggle-class>
                                            <strong class="block">{{ courses_name.count_tasks }}</strong>
                                            <span class="block">Заданий</span>
                                        </a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a class="p-y block text-center" data-ui-toggle-class>
                                            <strong class="block">{{ courses_name.count_lessons }}</strong>
                                            <span class="block">Тем</span>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "FreeCoursesComponent",
        props: ['data'],
        mounted() {

        },
        created() {

        }
    }
</script>

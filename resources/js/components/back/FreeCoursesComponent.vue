<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4" v-for="item in this.courses_name">
                        <div class="box text-center" style="background-color: rgba(255, 255, 255, 0.9)">
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
                            <div class="p-a-md">
                                <img :src="item.img" style="position: absolute;width: 100%;z-index: -1;margin-left: -50%;">
                                <router-link :to="item.link" class="text-md block">{{ item.title }}</router-link>
                                <p><small>{{ item.brief }}</small></p>
                                <router-link :to="item.link" class="btn btn-sm btn-outline rounded b-accent">Начать</router-link>
                            </div>
                            <div class="row row-col no-gutter b-t warn">
                                <div class="col-xs-4 b-r">
                                    <router-link :to="item.link" class="p-y block text-center" data-ui-toggle-class="">
                                        <strong class="block">{{ item.count_article }}</strong>
                                        <span class="block">Тем</span>
                                    </router-link>
                                </div>
                                <div class="col-xs-4 b-r">
                                    <router-link :to="item.link" class="p-y block text-center" data-ui-toggle-class="">
                                        <strong class="block">{{ item.count_tasks }}</strong>
                                        <span class="block">Заданий</span>
                                    </router-link>
                                </div>
                                <div class="col-xs-4">
                                    <router-link :to="item.link" class="p-y block text-center" data-ui-toggle-class="">
                                        <strong class="block">{{ item.count_lessons }}</strong>
                                        <span class="block">Уроков</span>
                                    </router-link>
                                </div>
                            </div>

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
        data(){
            return {
                courses_name:[],
            }
        },
        mounted() {

        },
        created() {
            let i = 0;
            this.data.free_courses_name.map((item) => {
                this.courses_name[i] = item;
                i++;
            });
        },
    }
</script>

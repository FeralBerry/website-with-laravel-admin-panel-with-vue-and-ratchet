<template>
    <bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1" id="course_article_page">
                        <div class="row">
                            <template v-for="courses in this.data.free_courses">
                                <template v-if="courses.type === 0">
                                    <template v-if="courses.link != null">
                                        <video :src="courses.link" controls width="600" height="400"></video>
                                    </template>
                                    <template v-if="courses.youtube != null">
                                        <iframe width="600" height="400" :src="courses.youtube" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </template>
                                    {{ courses.description }}
                                </template>
                                <template v-if="courses.type === 1">
                                    {{ courses.description }}
                                    <div contenteditable="true" id="example" class="p-3">{{ courses.task }}</div>
                                    <div id="task">

                                    </div>

                                    <div id="check_task" class="btn btn-success">Проверить</div>
                                </template>
                                <div style="display: none" id="task_number">{{ courses.id }}</div>
                            </template>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Заголовки уроков</h3>
                        <template v-for="item in this.courses_navigate">
                            <template v-if="item.id === data.last_open_free_course_id">
                                <a href="#" :id="item.id" class="active list-group-item">
                                    <!--<span class="pull-right label info">12</span>-->
                                    {{ item.title }}
                                </a>
                            </template>
                            <template v-if="item.id != data.last_open_free_course_id">
                                <a href="#" :id="item.id" class="list-group-item">
                                    <!--<span class="pull-right label info">12</span>-->
                                    {{ item.title }}
                                </a>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>


</template>
<script>
    export default {
        name: "FreeCourseComponent",
        props: ['data'],
        data(){
            return {
                courses_navigate:[],
                free_course:[],
                breadcrumb:{
                }
            }
        },

        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            connection.onopen = function(event){
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
            };
            let i = 0;

            this.data.free_courses_navigate.map((item) => {
                this.courses_navigate[i] = item;
                this.breadcrumb = {
                    'title':'Бесплатный урок №'+i+'',
                    'crumbs':{
                        'first':{
                            'title':'Home',
                            'link':'/user'
                        },
                        'second':{
                            'title':'Все бесплатные курсы',
                            'link':'/user/free/courses'
                        },
                        'third':{
                            'title':'Урок '+i+'',
                            'link':'/user/free/course/'+i+''
                        }
                    }
                }
                i++;
            });
        },
        mounted() {

        },
        methods:{

        }
    }
</script>




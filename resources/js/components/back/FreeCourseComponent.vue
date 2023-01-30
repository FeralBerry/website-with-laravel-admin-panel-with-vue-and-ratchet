<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-8" id="course_article_page">
                <template v-for="courses in this.data.free_courses">
                    {{ courses.description }}
                </template>
            </div>
            <div class="col-sm-4">
                <p class="m-a-0 m-b">Заголовки уроков</p>
                <div class="list-group m-b">
                    <template v-for="item in this.courses_navigate">
                        <template v-if="item.id === data.last_open_free_course_id">
                            <a @click="open_course(item.free_courses_name_id,item.id)" :id="item.id" class="active list-group-item">
                                <!--<span class="pull-right label info">12</span>-->
                                {{ item.title }}
                            </a>
                        </template>
                        <template v-if="item.id != data.last_open_free_course_id">
                            <a @click="open_course(item.free_courses_name_id,item.id)" :id="item.id" class="list-group-item">
                                <!--<span class="pull-right label info">12</span>-->
                                {{ item.title }}
                            </a>
                        </template>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "FreeCourseComponent",
        props: ['data'],
        data(){
            return {
                connection:null,
                courses_navigate:[],
                user_id:null,
                free_course:[],
            }
        },
        mounted() {

        },
        created() {
            this.connection = new WebSocket("ws://127.0.0.1:4710");
            this.user_id = document.querySelector('meta[name="user_id"]').content;
            let i = 0;
            this.data.free_courses_navigate.map((item) => {
                this.courses_navigate[i] = item;
                i++;
            });
            console.log(this.free_courses_navigate)
            this.connection.onmessage = function(event) {
                let data = JSON.parse(event.data);
                if(data.message === 'open_course'){
                    let course_page = document.getElementById('course_article_page');
                    data.free_courses.map((item) => {
                        course_page.innerHTML = item.description;
                    });
                }
            }
        },
        methods:{
            open_course(course,id){
                $('.list-group-item').removeClass('active')
                document.getElementById(id).classList.add('active');
                this.connection.send('{"command":"open_course","user_id":"'+this.user_id+'","course":"'+course+'","course_id":"'+id+'"}');
            }
        }
    }
</script>




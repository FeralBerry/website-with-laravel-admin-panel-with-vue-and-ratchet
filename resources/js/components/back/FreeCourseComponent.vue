<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-8" id="course_article_page">

            </div>
            <div class="col-sm-4">
                <p class="m-a-0 m-b">Заголовки уроков</p>
                <div class="list-group m-b">
                    <template v-for="item in this.courses_navigate">
                        <a @click="open_course(item.free_courses_name_id,item.id)" class="list-group-item">
                            <!--<span class="pull-right label info">12</span>-->
                            {{ item.title }}
                        </a>
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
            }
        },
        mounted() {

        },
        created() {
            let i = 0;
            this.data.free_courses_navigate.map((item) => {
                this.courses_navigate[i] = item;
                i++;
            });
            this.connection = new WebSocket("ws://127.0.0.1:4710");
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
                this.connection.send('{"command":"open_course","course":"'+course+'","course_id":"'+id+'"}');
            }
        }
    }
</script>

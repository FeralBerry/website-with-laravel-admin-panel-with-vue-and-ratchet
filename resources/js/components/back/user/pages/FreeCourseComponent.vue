<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-8" id="course_article_page">
                <template v-for="courses in this.data.free_courses">
                    <template v-if="courses.type === 0">
                        {{ courses.description }}
                    </template>
                    <template v-if="courses.type === 1">
                        {{ courses.description }}
                        <div>
                            <textarea placeholder="Enter HTML Source Code" id="editing" spellcheck="false" oninput="update(this.value); sync_scroll(this);" onscroll="sync_scroll(this);" onkeydown="check_tab(this, event);"></textarea>
                            <pre id="highlighting" aria-hidden="true">
                            </pre>
                            {{ courses.task }}
                        </div>
                    </template>
                </template>
            </div>
            <div class="col-sm-4">
                <p class="m-a-0 m-b">Заголовки уроков</p>
                <div class="list-group m-b">
                    <template v-for="item in this.courses_navigate">
                        <template v-if="item.id === data.last_open_free_course_id">
                            <a :id="item.id" class="active list-group-item">
                                <!--<span class="pull-right label info">12</span>-->
                                {{ item.title }}
                            </a>
                        </template>
                        <template v-if="item.id != data.last_open_free_course_id">
                            <a :id="item.id" class="list-group-item">
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
                courses_navigate:[],
                free_course:[],
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
                i++;
            });
        },
        mounted() {

        },
        methods:{

        }
    }
</script>




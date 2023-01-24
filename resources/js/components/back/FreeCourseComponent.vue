<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-8" id="course_article_page">

            </div>
            <div class="col-sm-4">
                <p class="m-a-0 m-b">Заголовки уроков</p>
                <div class="list-group m-b">
                    <template v-for="item in this.courses_navigate">
                        <router-link tag="course_article_page" :to="'/user/free/course/'+item.free_courses_name_id+'/'+item.id+''" class="list-group-item">
                            <!--<span class="pull-right label info">12</span>-->
                            {{ item.title }}
                        </router-link>
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
        }
    }
</script>

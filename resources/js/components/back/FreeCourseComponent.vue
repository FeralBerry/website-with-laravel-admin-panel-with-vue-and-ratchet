<template>
    <div class="padding">
        <div class="row">
            <div class="col-sm-8" id="course_article_page">
                <router-view :data='{ data }'></router-view>
            </div>
            <div class="col-sm-4">
                <p class="m-a-0 m-b">Заголовки уроков</p>
                <div class="list-group m-b" v-for="item in data.free_courses_navigate">
                    <router-link :to="'/user/course/'+item.free_courses_name_id+'/'+item.id+''" class="list-group-item">
                        <!--<span class="pull-right label info">12</span>-->
                        {{ item.title }}
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "FreeCourseComponent",
        props: ['data'],
        mounted() {

        },
        created() {

        }
    }
</script>

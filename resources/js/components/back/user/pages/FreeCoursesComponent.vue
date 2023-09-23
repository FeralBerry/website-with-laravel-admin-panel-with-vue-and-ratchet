<template>
    <bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>
        <div class="col-md-12">
            <div class="row" id="app-body">

            </div>
        </div>
</template>
<script>
    export default {
        name: "FreeCoursesComponent",
        props: ['data'],
        data(){
            return {
                connection:null,
                courses_name:[],
                breadcrumb:{
                    'title':'FreeLessons',
                    'crumbs':{
                        'first':{
                            'title':'Home',
                            'link':'/user'
                        },
                        'second':{
                            'title':'FreeLessons',
                            'link':'/user/free/courses'
                        },
                        'third':null
                    }
                }
            }
        },
        mounted() {

        },
        created() {

        },
    }
</script>

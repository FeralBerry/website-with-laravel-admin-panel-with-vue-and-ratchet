<template>
    <!--<bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>-->
    <section class="content">

    </section>


</template>
<script>
    export default {
        name: "BuyCoursesComponent",
        props: ['data'],
        data(){
            return {

                breadcrumb:{

                }
            }
        },

        created() {
            /*let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            connection.onopen = function(event){
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
            };
            let i = 0;*/

            /*this.data.free_courses_navigate.map((item) => {
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
            });*/
        },
        mounted() {

        },
        methods:{

        }
    }
</script>




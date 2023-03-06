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
            let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            connection.onopen = function(event){
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
                connection.send('{"command":"open_free_courses"}');
            };
            connection.onmessage = function(event){
                let data = JSON.parse(event.data);
                if(data.message === 'open_free_courses'){
                    data.free_courses_name.map((item) => {
                        let courses = document.getElementById('app-body');
                        courses.innerHTML += '<div class="col-md-4">' +
                            '            <div class="card card-widget widget-user">' +
                            '                <div class="widget-user-header text-white" style="background: url('+item.img+') center center;background-size: cover">' +
                            '                    <h3 class="widget-user-username text-right">'+item.title+'</h3>' +
                            '                    <h5 class="widget-user-desc text-right">'+item.brief+'</h5>' +
                            '                </div>' +
                            '                <div class="card-footer">' +
                            '<a href="'+item.link+'" style="margin-top: -20px" class="btn btn-block btn-outline-info btn-sm">Начать</a>'+
                            '                    <div class="row">' +
                            '                        <div class="col-sm-4 border-right">' +
                            '                            <div class="description-block">' +
                            '                                <h5 class="description-header">'+item.count_lessons+'</h5>' +
                            '                                <span class="description-text">Уроков</span>' +
                            '                            </div>' +
                            '                        </div>' +
                            '                        <div class="col-sm-4 border-right">' +
                            '                            <div class="description-block">' +
                            '                                <h5 class="description-header">'+item.count_article+'</h5>' +
                            '                                <span class="description-text">Статей</span>' +
                            '                            </div>' +
                            '                        </div>' +
                            '                        <div class="col-sm-4">' +
                            '                            <div class="description-block">' +
                            '                                <h5 class="description-header">'+item.count_tasks+'</h5>' +
                            '                                <span class="description-text">Заданий</span>' +
                            '                            </div>' +
                            '                        </div>' +
                            '                    </div>' +
                            '                </div>' +
                            '            </div>' +
                            '        </div>';
                    });
                }
            }
        },
    }
</script>

<template>
    <bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>
    <section class="content">
        <div class="row" id="app-body">

        </div>
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
            this.breadcrumb = {
                'title':'Покупка курсов',
                'crumbs':{
                    'first':{
                        'title':'Home',
                        'link':'/user'
                    },
                    'second':{
                        'title':'Покупка курсов',
                        'link':'/user/buy/courses'
                    },
                    'third':null
                }
            }
            let connection = new WebSocket("ws://127.0.0.1:4710");
            let user_id = document.querySelector('meta[name="user_id"]').content;
            connection.onopen = function(event){
                connection.send('{"command":"connect","user_id":"'+user_id+'"}');
                connection.send('{"command":"open_buy_courses","user_id":"'+user_id+'"}');
            };
            connection.onmessage = function(event){
                let data = JSON.parse(event.data);
                if(data.message === 'open_buy_courses'){
                    data.buy_courses_name.map((item) => {
                        let courses = document.getElementById('app-body');
                        courses.innerHTML += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">' +
                            '                <div class="card card-widget widget-user">' +
                            '                    <div class="widget-user-header text-white" style="background: url('+item.img+') center center;background-size: cover">' +
                            '                        <h3 class="widget-user-username text-right">'+item.title+'</h3>' +
                            '                        <h5 class="widget-user-desc text-right">'+item.description+'</h5>' +
                            '                    </div>' +
                            '                    <div class="card-footer p-0">' +
                            '                        <ul class="border">' +
                            '                            <li>Уроков <span class="float-right badge bg-primary">'+item.count_article+'</span></li>' +
                            '                            <li>Статей <span class="float-right badge bg-info">'+item.count_lessons+'</span></li>' +
                            '                            <li>Практических заданий <span class="float-right badge bg-success">'+item.count_tasks+'</span></li>' +
                            '                            <li>Готовых кодов <span class="float-right badge bg-danger">842</span></li>' +
                            '                            <li>Получили сертификаты <span class="float-right badge bg-danger">842</span></li>' +
                            '                        </ul>' +
                            '                        <div class="col-md-12" style="text-align: center">' +
                            '<div class="col-md-12"><h3>'+item.price+'.'+item.sub_price+' &#8381;</h3></div>'+
                            '                            <a href="#" id="courses'+item.id+'" class="animated-button4">' +
                            '                                <span></span>' +
                            '                                <span></span>' +
                            '                                <span></span>' +
                            '                                <span></span>' +
                            '                                Купить' +
                            '                            </a>' +
                            '                        </div>' +
                            '                    </div>' +
                            '                </div>' +
                            '            </div>'
                    });
                }
            }


        },
        mounted() {

        },
        methods:{

        }
    }
</script>




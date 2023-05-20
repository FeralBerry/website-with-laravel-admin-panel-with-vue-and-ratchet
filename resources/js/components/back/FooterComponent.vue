<template>
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 - {{ date_now }} <a href="https://easy-script.io">Easy-Script.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> {{ this.data.version }}
        </div>
    </footer>
</template>
<script>
    export default {
        name: "FooterComponent",
        props: ['data'],
        data() {
            return {
                today:'',
                date_now:'',
            }
        },
        watch: {
            $route(to, from) {
                //Подгрузка данных на страницу
                let con = this;
                setTimeout(function () {
                    //Проверка адреса страницы по имени роутера vue.js
                    if (to.name) {
                        //Отправка данных на Ratchet сокет для определения нужных данных для подгрузки
                        con.connection.send('{"command":"' + to.name + '"}')
                    }
                }, 500);
                this.connection.onmessage = function(event) {
                    //Распарсивание данных полученых от сокета
                    let data = JSON.parse(event.data);
                    if (data.message === 'user_free_courses_index') {
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
            }
        },
        mounted() {
            //Определение протокола
            let protocol = 'ws://';
            if (window.location.protocol === 'https:') {
                protocol = 'wss://';
            }
            //Соединение протокола и адреса приложения из настроек
            let wsUri = protocol+ process.env.MIX_WSS_URL;
            //Сохранение объекта данных для поддержания соединения с сокетом Ratchet
            this.connection = new WebSocket(wsUri);
        },
        created() {
            this.today = new Date();
            this.date_now = this.today.getFullYear()
        }
    }
</script>

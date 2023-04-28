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
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                connection:[],
                user_id:$('meta[name=user_id]').attr('content'),
            }
        },
        watch: {
            $route(to, from) {
                //Подгрузка данных на страницу
                let con = this;
                console.log(this.connection)
                setTimeout(function (){
                    //Проверка адреса страницы по имени роутера vue.js
                    if(to.name){
                        //Отправка данных на Ratchet сокет для определения нужных данных для подгрузки
                        con.connection.send('{"command":"'+to.name+'"}')
                    }
                },500);
                //Получение ответа от Ratchet сокета
                this.connection.onmessage = function(event) {
                    //Распарсивание данных полученых от сокета
                    let data = JSON.parse(event.data);
                    if(data.message === 'admin-blog-index'){//проверка получаемых данных для отрисовки страницы блога
                        $('#blog_table').html('');
                        let tags = '';
                        data.blog.map((item) => {
                            for(let i = 0; i < item.tags_icon.length; i++){
                                tags += '<i class="'+item.tags_icon[i]+'"></i> '+item.tags_name[i]+'<br>';
                            }
                            document.getElementById('blog_table').innerHTML += '<tr><td>'+item.title+'</td>' +
                                '<td>'+item.description+'</td>' +
                                '<td><img style="width:200px" src="'+item.img+'"></td>' +
                                '<td><div class="row">' +
                                '<div class="col-md-12">' +
                                tags +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<a class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
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

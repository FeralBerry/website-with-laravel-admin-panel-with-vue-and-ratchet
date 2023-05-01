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
                            document.getElementById('blog_table').innerHTML += '<tr id="blog_article_'+item.id+'"><td>'+item.title+'</td>' +
                                '<td>'+item.description+'</td>' +
                                '<td><img style="width:200px" src="'+item.img+'"></td>' +
                                '<td><div class="row">' +
                                '<div class="col-md-12">' +
                                tags +
                                '</div>' +
                                '</td>' +
                                '<td>' +
                                '<a href="/admin/blog/edit/'+item.id+'" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a href="#" onclick="blog_article_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                        });
                    }
                    else if(data.message === 'admin-blog-add'){
                        let blog_tags_add = document.getElementById('blog_tags_add');
                        if(data.blog_tags.length > 0){
                            $('#blog_tags_add').html('');
                            data.blog_tags.map((item) => {
                                blog_tags_add.innerHTML += '<div class="col-md-3 custom-control custom-checkbox">' +
                                    '<input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="tags[]" id="tag_'+item.id+'" value="'+item.id+'" type="checkbox">' +
                                    '<label for="tag_'+item.id+'" class="custom-control-label"><i class="'+item.icon+'"></i> '+item.name+'</label>' +
                                    '</div>'
                            });
                        }
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

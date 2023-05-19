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
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true, "lengthChange": false, "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
                $(function () {
                    // Summernote
                    $('.summernote').summernote();
                });
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
                        $('#blog_table').html('');//очищаем таблицу от данных
                        let tags = '';
                        data.blog.map((item) => { //обходим массив данных таблицы блог
                            for(let i = 0; i < item.tags_icon.length; i++){
                                tags += '<i class="'+item.tags_icon[i]+'"></i> '+item.tags_name[i]+'<br>'; //сохраняем все теги с иконками относящиеся к данной статье
                            }
                            //заполнякем таблицу данными по статьям блога
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
                                '<a href="/admin/blog/delete/'+item.id+'" onclick="return confirm(`Точно нужно удалить статью!`)" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
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
                    else if(data.message === 'admin-blog-tags-index'){
                        $('#blog_tags').html('');
                        data.blog_tags.map((item) => {
                            document.getElementById('blog_tags').innerHTML += '<tr style="font-size:20px" id="blog_tag_'+item.id+'">' +
                                '<td><input class="form-control" name="icon" id="icon_'+item.id+'" value="'+item.icon+'"></td>' +
                                '<td><input class="form-control" name="icon" id="tag_name_'+item.id+'" value="'+item.name+'"></td>'+
                                '<td>' +
                                '<a onclick="tag_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="tag_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '</td>';
                        });
                    }
                    else if(data.message === 'admin-users-index'){
                        $('#users_table').html('');
                        data.users.map((item) => {
                            let ava = 'no-img45x45.png';
                            let role = 'user';
                            if(item.avatar !== null){
                                ava = item.avatar;
                            }
                            if(item.role == 1){
                                role = 'admin';
                            }
                            document.getElementById('users_table').innerHTML += '<tr id="user_'+item.id+'">' +
                                '<td>'+item.name+'</td>'+
                                '<td>'+item.email+'</td>'+
                                '<td>'+role+'</td>'+
                                '<td>'+item.connection_id+'</td>'+
                                '<td><img src="/back/img/avatar/'+ava+'"></td>'+
                                '<td>' +
                                '<a onclick="user_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="user_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>'+
                                '</tr>';

                        });
                    }
                    else if(data.message === 'admin-contact-index'){
                        $('#contacts').html('');
                        let contacts = document.getElementById('contacts');
                        data.contact.map((item) => {
                            contacts.innerHTML += '<tr>' +
                                '<td>Телефон:</td>' +
                                '<td><input class="form-control" name="phone" id="phone" value="'+item.phone+'"></td>' +
                                '<td><a onclick="contact_edit(`phone`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Оснорвной Е-маил:</td>' +
                                '<td><input class="form-control" name="email" id="email" value="'+item.email+'"></td>' +
                                '<td><a onclick="contact_edit(`email`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Второй Е-маил:</td>' +
                                '<td><input class="form-control" name="second_email" id="second_email" value="'+item.second_email+'"></td>' +
                                '<td><a onclick="contact_edit(`second_email`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>WhatsApp:</td>' +
                                '<td><input class="form-control" name="whatsapp" id="whatsapp" value="'+item.whatsapp+'"></td>' +
                                '<td><a onclick="contact_edit(`whatsapp`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Телеграм:</td>' +
                                '<td><input class="form-control" name="telegram" id="telegram" value="'+item.telegram+'"></td>' +
                                '<td><a onclick="contact_edit(`telegram`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>ВК:</td>' +
                                '<td><input class="form-control" name="vk" id="vk" value="'+item.vk+'"></td>' +
                                '<td><a onclick="contact_edit(`vk`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>GIT:</td>' +
                                '<td><input class="form-control" name="git" id="git" value="'+item.git+'"></td>' +
                                '<td><a onclick="contact_edit(`git`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Интаграм:</td>' +
                                '<td><input class="form-control" name="instagram" id="instagram" value="'+item.instagram+'"></td>' +
                                '<td><a onclick="contact_edit(`instagram`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Twitter:</td>' +
                                '<td><input class="form-control" name="twitter" id="twitter" value="'+item.twitter+'"></td>' +
                                '<td><a onclick="contact_edit(`twitter`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td>Youtube:</td>' +
                                '<td><input class="form-control" name="youtube" id="youtube" value="'+item.youtube+'"></td>' +
                                '<td><a onclick="contact_edit(`youtube`)" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>' +
                                '</tr>';
                        });
                    }
                    else if(data.message === 'admin-seo-index'){
                        $('#seo_table').html('');
                        let seo_table = document.getElementById('seo_table');
                        data.seo.map((item) => {
                            seo_table.innerHTML += '<tr id="seo_'+item.id+'">' +
                                '<td><input class="form-control" name="url_'+item.id+'" id="url_'+item.id+'" value="'+item.url+'"></td>'+
                                '<td><input class="form-control" name="title_'+item.id+'" id="title_'+item.id+'" value="'+item.title+'"></td>'+
                                '<td><textarea class="form-control" name="description_'+item.id+'" id="description_'+item.id+'">'+item.description+'</textarea></td>'+
                                '<td><textarea class="form-control" name="keywords_'+item.id+'" id="keywords_'+item.id+'">'+item.keywords+'</textarea></td>'+
                                '<td>' +
                                '<a onclick="seo_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="seo_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '</td>'+
                                '</tr>';
                        });
                    }
                    else if(data.message === 'admin-free-courses-name-index'){
                        $('#free_courses_name_table').html('');
                        let free_courses_name_table = document.getElementById('free_courses_name_table');
                        data.free_courses_name.map((item) => {
                            free_courses_name_table.innerHTML += '<tr id="free_courses_name_'+item.id+'">' +
                                '<td><input class="form-control form-control-lg" name="free_courses_name_title_'+item.id+'" id="free_courses_name_title_'+item.id+'" type="text" placeholder="Название" value="'+item.title+'"></td>' +
                                '<td><textarea class="form-control" name="free_courses_name_brief_'+item.id+'" id="free_courses_name_brief_'+item.id+'" placeholder="Краткое описание">'+item.brief+'</textarea></td>' +
                                '<td><input class="form-control" type="file" name="free_courses_name_img_'+item.id+'" id="free_courses_name_img_'+item.id+'" value="'+item.img+'">' +
                                '<input class="form-control" type="hidden" name="free_courses_name_old_img_'+item.id+'" id="free_courses_name_old_img_'+item.id+'" value="'+item.img+'"><img id="old_img_'+item.id+'" width="200px" src="'+item.img+'"></td>' +
                                '<td><input class="form-control" type="text" name="free_courses_name_link_'+item.id+'" id="free_courses_name_link_'+item.id+'" placeholder="Ссылка" value="'+item.link+'"></td>' +
                                '<td>' +
                                '<a onclick="free_courses_name_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="free_courses_name_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '<a onclick="free_courses_name_erase('+item.id+')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>' +
                                '</td>'+
                                '</tr>'
                        });
                    }
                    else if(data.message === 'admin-pay-courses-name-index'){
                        $('#pay_courses_name_table').html('');
                        let pay_courses_name_table = document.getElementById('pay_courses_name_table');
                        data.pay_courses_name.map((item) => {
                            pay_courses_name_table.innerHTML += '<tr id="pay_courses_name_'+item.id+'">' +
                                '<td><input class="form-control form-control-lg" name="pay_courses_name_title_'+item.id+'" id="pay_courses_name_title_'+item.id+'" type="text" placeholder="Название" value="'+item.title+'"></td>' +
                                '<td><textarea class="form-control" name="pay_courses_name_brief_'+item.id+'" id="pay_courses_name_brief_'+item.id+'" placeholder="Краткое описание">'+item.brief+'</textarea></td>' +
                                '<td><input class="form-control" type="file" name="pay_courses_name_img_'+item.id+'" id="pay_courses_name_img_'+item.id+'" value="'+item.img+'">' +
                                '<input class="form-control" type="hidden" name="pay_courses_name_old_img_'+item.id+'" id="pay_courses_name_old_img_'+item.id+'" value="'+item.img+'"><img id="old_img_'+item.id+'" width="200px" src="'+item.img+'"></td>' +
                                '<td><input class="form-control" type="text" name="pay_courses_name_link_'+item.id+'" id="pay_courses_name_link_'+item.id+'" placeholder="Ссылка" value="'+item.link+'"></td>' +
                                '<td>' +
                                '<a onclick="pay_courses_name_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="pay_courses_name_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                                '<a onclick="pay_courses_name_erase('+item.id+')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>' +
                                '</td>'+
                                '</tr>'
                        });
                    }
                    else if(data.message === 'admin-free-courses-index'){
                        $('#free_courses_table').html('');
                        let free_courses_table = document.getElementById('free_courses_table');
                        data.free_courses.map((item) => {
                            let courses_name = '';
                            let video = '';
                            data.free_courses_name.map((name) => {
                                if(name.id == item.free_courses_name_id){
                                    courses_name = name.title;
                                }
                            });
                            if(data.link !== null){
                                video = '<video><source src="'+item.link+'" /></video>';
                            }
                            if(data.youtube !== null){
                                video = item.youtube
                            }
                            free_courses_table.innerHTML += '<tr id="free_courses_'+item.id+'">' +
                                '<td>'+item.title+'<br><span style="color:#0a53be">'+courses_name+'</span></td>'+
                                '<td>'+item.description+'</td>'+
                                '<td>'+video+'</td>'+
                                '<td>'+item.type+'</td>'+
                                '<td></td>'+
                                '<td>' +
                                '<a href="/admin/free_courses/edit/'+item.id+'" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                                '<a onclick="free_courses_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>'+
                                '</tr>';
                        });
                    }
                    else if(data.message === 'admin-question-index'){
                        $('#question').html('');
                        let question = document.getElementById('question');
                        let i;
                        if(data.footer_message.length >= data.question.length){
                            i = data.footer_message.length;
                        } else {
                            i = data.question.length;
                        }

                        for(let j = 0;j<i;j++){
                            let question_name = '';
                            let question_id = '';
                            let question_email = '';
                            let question_subject = '';
                            let question_message = '';
                            let footer_message_id = '';
                            let footer_message_name = '';
                            let footer_message_phone = '';
                            let footer_message_message = '';
                            if(data.question.length > 0){
                                question_id = data.question[j].id;
                                question_name = data.question[j].name;
                                question_email = data.question[j].email;
                                question_subject = data.question[j].subject;
                                question_message = data.question[j].message;
                            }
                            if(data.footer_message.length > 0){
                                footer_message_id = data.footer_message[j].id;
                                footer_message_name = data.footer_message[j].name;
                                footer_message_phone = data.footer_message[j].phone;
                                footer_message_message = data.footer_message[j].message;
                            }
                            document.getElementById('question').innerHTML += '<tr>' +
                                '<td id="question_'+question_id+'">' +
                                '<div class="col-md-12">Имя: '+question_name+'</div>' +
                                '<div class="col-md-12">Email: '+question_email+'</div>' +
                                '<div class="col-md-12">Тема: '+question_subject+'</div>' +
                                '<div class="col-md-12">Текст: '+question_message+'</div>' +
                                '</td>' +
                                '<td>' +
                                '<a onclick="question_delete('+question_id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>'+
                                '</td>' +
                                '<td id="footer_message_'+footer_message_id+'">' +
                                '<div class="col-md-12">Имя: '+footer_message_name+'</div>' +
                                '<div class="col-md-12">Телефон: '+footer_message_phone+'</div>' +
                                '<div class="col-md-12">Тема: '+footer_message_message+'</div>' +
                                '</td>' +
                                '<td>' +
                                '<a onclick="footer_message_delete('+footer_message_id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>'+
                                '</td>' +
                                '</tr>';
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
            this.date_now = this.today.getFullYear();
        },
    }
</script>

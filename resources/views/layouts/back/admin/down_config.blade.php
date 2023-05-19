<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}" defer></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/js/adminlte.js') }}"></script>
<!-- Bootstrap Material Design -->
<script src="{{ asset('back/js/popper.min.js') }}"></script>
<script src="{{ asset('back/js/bootstrap-material-design.min.js') }}"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('back/js/demo.js') }}"></script>

<script>
    $("body").on('click', ".nav-link", function() {
        $(".nav-link").not(this).removeClass("active");
        this.classList.add('active');
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function tag_edit(id) {
        let name = document.getElementById('tag_name_'+id).value;
        let icon = document.getElementById('icon_'+id).value;
        $.ajax({
            type: "POST", //Метод отправки
            url: "/admin/blog/tags/edit/"+id, //путь до php фаила отправителя
            data: {
                'name':name,
                'icon':icon,
            },
            success: function(data) {
                alert('Тег '+data+' успешно изменен!')
            }
        });
        return false;
    }
    function tag_delete(id) {
        $.ajax({
            async: true,
            type: "POST",
            url: '/admin/blog/tags/delete/' + id,
            data: {},
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                return confirm("Точно нужно удалить тег!");
            },
            success: function (data) {
                let blog_tag = document.getElementById('blog_tag_'+id).remove();
            },
        });
    }
    $(document).ready(function(){
        $("#blog_tags_add").submit(function(e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault(); // отменяем событие
            var form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
                type: "POST", //Метод отправки
                url: "/admin/blog/tags/add", //путь до php фаила отправителя
                data: form_data,
                success: function(data) {
                    data.tag.map((item) => {
                        document.getElementById('blog_tags').innerHTML += '<tr style="font-size:20px" id="blog_tag_'+item.id+'">' +
                            '<td><input class="form-control" name="icon" id="icon_'+item.id+'" value="'+item.icon+'"></td>' +
                            '<td><input class="form-control" name="icon" id="tag_name_'+item.id+'" value="'+item.name+'"></td>'+
                            '<td>' +
                            '<a onclick="tag_edit('+item.id+')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                            '<a onclick="tag_delete('+item.id+')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                            '</td>';
                    });
                }
            });
            return false;
        });
    });
    function contact_edit(name){
        let example = document.getElementById(name).value;
        $.ajax({
            type:'POST',
            data:{
                'example':example,
            },
            url:'/admin/contact/edit/'+name,
            success:function (data) {
                alert(data);
            }
        });
    }
    function seo_edit(id) {
        let url = document.getElementById('url_'+id).value;
        let title = document.getElementById('title_'+id).value;
        let description = document.getElementById('description_'+id).value;
        let keywords = document.getElementById('keywords_'+id).value;
        $.ajax({
            type:'POST',
            data:{
                'url':url,
                'title':title,
                'description':description,
                'keywords':keywords,
            },
            url:'/admin/seo/edit/'+id,
            success:function (data) {
                alert(data);
            }
        });
    }
    function seo_add() {
        let url = document.getElementById('url').value;
        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let keywords = document.getElementById('keywords').value;
        $.ajax({
            type:'POST',
            data:{
                'url':url,
                'title':title,
                'description':description,
                'keywords':keywords,
            },
            url:'/admin/seo/add',
            success:function (data) {
                alert('SEO успешно добавлено!');
                data.seo.map((item) => {
                    document.getElementById('seo_table').innerHTML += '<tr id="seo_'+item.id+'">' +
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
        });
    }
    function seo_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/seo/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно это SEO!");
            },
            success:function (data) {
                document.getElementById('seo_'+id).remove();
            }
        });
    }
    function free_courses_name_edit(id) {
        let free_courses_name_title = document.getElementById('free_courses_name_title_' + id).value;
        let free_courses_name_brief = document.getElementById('free_courses_name_brief_' + id).value;
        let free_courses_name_img = document.getElementById('free_courses_name_img_' + id).files[0];
        let free_courses_name_link = document.getElementById('free_courses_name_link_' + id).value;
        let free_courses_name_old_img = document.getElementById('free_courses_name_old_img_' + id).value;
        let old_img = document.getElementById('old_img_' + id);
        let formData = new FormData;
        formData.append('free_courses_name_title',free_courses_name_title);
        formData.append('free_courses_name_brief',free_courses_name_brief);
        formData.append('free_courses_name_img',free_courses_name_img);
        formData.append('free_courses_name_link',free_courses_name_link);
        formData.append('free_courses_name_old_img',free_courses_name_old_img);
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            url: '/admin/free_courses_name/edit/' + id,
            success: function (data) {
                alert(data.message);
                old_img.src = data.img;
            }
        });
    }
    function free_courses_name_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/free_courses_name/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить этот курс!");
            },
            success:function (data) {
                document.getElementById('free_courses_name_'+id).remove();
            }
        });
    }
    function free_courses_name_erase(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/free_courses_name/erase/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить это название курса!");
            },
            success:function (data) {
                document.getElementById('free_courses_name_'+id).remove();
            }
        });
    }
    $(document).ready(function() {
        $("#free_courses_name_form").submit(function (e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault(); // отменяем событие
            let free_courses_name_title = document.getElementById('free_courses_name_title').value;
            let free_courses_name_brief = document.getElementById('free_courses_name_brief').value;
            let free_courses_name_img = document.getElementById('free_courses_name_img').files[0];
            let free_courses_name_link = document.getElementById('free_courses_name_link').value;
            let formData = new FormData;
            formData.append('free_courses_name_title',free_courses_name_title);
            formData.append('free_courses_name_brief',free_courses_name_brief);
            formData.append('free_courses_name_img',free_courses_name_img);
            formData.append('free_courses_name_link',free_courses_name_link);
            $.ajax({
                type: "POST", //Метод отправки
                url: "/admin/free_courses_name/add", //путь до php фаила отправителя
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    let free_courses_name_table = document.getElementById('free_courses_name_table');
                    data.free_courses_name.map((item) => {
                        free_courses_name_table.innerHTML += '<tr id="free_courses_name_' + item.id + '">' +
                            '<td><input class="form-control form-control-lg" name="free_courses_name_title_' + item.id + '" id="free_courses_name_title_' + item.id + '" type="text" placeholder="Название" value="' + item.title + '"></td>' +
                            '<td><textarea class="form-control" name="free_courses_name_brief_' + item.id + '" id="free_courses_name_brief_' + item.id + '" placeholder="Краткое описание">' + item.brief + '</textarea></td>' +
                            '<td><input class="form-control" type="file" name="free_courses_name_img_' + item.id + '" id="free_courses_name_img_' + item.id + '" value="' + item.img + '">' +
                            '<input class="form-control" type="hidden" name="free_courses_name_old_img_' + item.id + '" id="free_courses_name_old_img_' + item.id + '" value="' + item.img + '"><img id="old_img_' + item.id + '" width="200px" src="' + item.img + '"></td>' +
                            '<td><input class="form-control" type="text" name="free_courses_name_link_' + item.id + '" id="free_courses_name_link_' + item.id + '" placeholder="Ссылка" value="' + item.link + '"></td>' +
                            '<td>' +
                            '<a onclick="free_courses_name_edit(' + item.id + ')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                            '<a onclick="free_courses_name_delete(' + item.id + ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                            '<a onclick="free_courses_name_erase(' + item.id + ')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>' +
                            '</td>' +
                            '</tr>'
                    });
                }
            });
        });
    });
    function pay_courses_name_edit(id) {
        let pay_courses_name_title = document.getElementById('pay_courses_name_title_' + id).value;
        let pay_courses_name_brief = document.getElementById('pay_courses_name_brief_' + id).value;
        let pay_courses_name_img = document.getElementById('pay_courses_name_img_' + id).files[0];
        let pay_courses_name_link = document.getElementById('pay_courses_name_link_' + id).value;
        let pay_courses_name_old_img = document.getElementById('pay_courses_name_old_img_' + id).value;
        let old_img = document.getElementById('old_img_' + id);
        let formData = new FormData;
        formData.append('pay_courses_name_title',pay_courses_name_title);
        formData.append('pay_courses_name_brief',pay_courses_name_brief);
        formData.append('pay_courses_name_img',pay_courses_name_img);
        formData.append('pay_courses_name_link',pay_courses_name_link);
        formData.append('pay_courses_name_old_img',pay_courses_name_old_img);
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            url: '/admin/pay_courses_name/edit/' + id,
            success: function (data) {
                alert(data.message);
                old_img.src = data.img;
            }
        });
    }
    function pay_courses_name_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/pay_courses_name/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить этот курс!");
            },
            success:function (data) {
                document.getElementById('pay_courses_name_'+id).remove();
            }
        });
    }
    function pay_courses_name_erase(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/pay_courses_name/erase/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить это название курса!");
            },
            success:function (data) {
                document.getElementById('pay_courses_name_'+id).remove();
            }
        });
    }
    $(document).ready(function() {
        $("#pay_courses_name_form").submit(function (e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault(); // отменяем событие
            let pay_courses_name_title = document.getElementById('pay_courses_name_title').value;
            let pay_courses_name_brief = document.getElementById('pay_courses_name_brief').value;
            let pay_courses_name_img = document.getElementById('pay_courses_name_img').files[0];
            let pay_courses_name_link = document.getElementById('pay_courses_name_link').value;
            let formData = new FormData;
            formData.append('pay_courses_name_title',pay_courses_name_title);
            formData.append('pay_courses_name_brief',pay_courses_name_brief);
            formData.append('pay_courses_name_img',pay_courses_name_img);
            formData.append('pay_courses_name_link',pay_courses_name_link);
            $.ajax({
                type: "POST", //Метод отправки
                url: "/admin/pay_courses_name/add", //путь до php фаила отправителя
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    let pay_courses_name_table = document.getElementById('pay_courses_name_table');
                    data.pay_courses_name.map((item) => {
                        pay_courses_name_table.innerHTML += '<tr id="pay_courses_name_' + item.id + '">' +
                            '<td><input class="form-control form-control-lg" name="pay_courses_name_title_' + item.id + '" id="pay_courses_name_title_' + item.id + '" type="text" placeholder="Название" value="' + item.title + '"></td>' +
                            '<td><textarea class="form-control" name="pay_courses_name_brief_' + item.id + '" id="pay_courses_name_brief_' + item.id + '" placeholder="Краткое описание">' + item.brief + '</textarea></td>' +
                            '<td><input class="form-control" type="file" name="pay_courses_name_img_' + item.id + '" id="pay_courses_name_img_' + item.id + '" value="' + item.img + '">' +
                            '<input class="form-control" type="hidden" name="pay_courses_name_old_img_' + item.id + '" id="pay_courses_name_old_img_' + item.id + '" value="' + item.img + '"><img id="old_img_' + item.id + '" width="200px" src="' + item.img + '"></td>' +
                            '<td><input class="form-control" type="text" name="pay_courses_name_link_' + item.id + '" id="pay_courses_name_link_' + item.id + '" placeholder="Ссылка" value="' + item.link + '"></td>' +
                            '<td>' +
                            '<a onclick="pay_courses_name_edit(' + item.id + ')" class="btn btn-success"><i class="fa fa-pencil"></i></a>' +
                            '<a onclick="pay_courses_name_delete(' + item.id + ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>' +
                            '<a onclick="pay_courses_name_erase(' + item.id + ')" class="btn btn-danger"><i class="fa fa-eraser"></i></a>' +
                            '</td>' +
                            '</tr>'
                    });
                }
            });
        });
    });
    function free_courses_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/free_courses/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить этот урок!");
            },
            success:function (data) {
                document.getElementById('free_courses_'+id).remove();
            }
        });
    }
    function question_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/question/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить этот вопрос!");
            },
            success:function (data) {
                document.getElementById('question_'+id).remove();
            }
        });
    }
    function footer_message_delete(id) {
        $.ajax({
            type:'POST',
            data:{},
            url:'/admin/footer_message/delete/'+id,
            beforeSend:function(){
                return confirm("Точно нужно удалить этот вопрос!");
            },
            success:function (data) {
                document.getElementById('footer_message_'+id).remove();
            }
        });
    }
</script>



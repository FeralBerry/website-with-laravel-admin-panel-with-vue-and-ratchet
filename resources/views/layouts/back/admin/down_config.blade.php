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
    $(function () {
        // Summernote
        $('#summernote').summernote()

        /*// CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });*/
    });
</script>
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

</script>



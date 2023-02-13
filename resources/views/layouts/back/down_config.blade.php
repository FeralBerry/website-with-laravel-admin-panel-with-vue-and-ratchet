<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('back/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('back/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('back/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('back/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('back/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('back/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('back/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('back/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/dist/js/adminlte.js') }}"></script>
<!-- Bootstrap Material Design -->
<script src="{{ asset('back/js/popper.min.js') }}"></script>
<script src="{{ asset('back/js/bootstrap-material-design.min.js') }}"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('back/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('back/js/pages/dashboard.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('submit', '#profile_avatar', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            async: true,
            type: "POST",
            url: '/user/profile/edit/avatar',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function(data){
                let user_avatar = document.getElementById('user_avatar');
                user_avatar.src = '/back/img/avatar/'+data.src;
                alert(data.msg);
            }
        });
    });
    $('body').on('submit', '#profile_settings', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            async: true,
            type: "POST",
            url: '/user/profile/edit',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function(data){
                alert(data.msg);
            }
        });
    });

    $('body').on('submit', '#profile_settings', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            async: true,
            type: "POST",
            url: '/user/profile/edit',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function(data){
                alert(data.msg);
            }
        });
    });
    $('body').on('submit', '#new_password', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            async: true,
            type: "POST",
            url: '/user/profile/new/password',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function(data){
                let bad_old_password = document.getElementById('bad_old_password');
                let not_confirm_password = document.getElementById('not_confirm_password');
                let small_password = document.getElementById('small_password');
                not_confirm_password.innerHTML = '';
                not_confirm_password.style.display = 'block';
                small_password.innerHTML = '';
                small_password.style.display = 'block';
                bad_old_password.innerHTML = '';
                bad_old_password.style.display = 'block';
                if(data === 'Пароли не совпадают, проверьте пароли и повторите попытку.'){
                    not_confirm_password.innerHTML = data;
                    not_confirm_password.style.color = 'red';
                    setTimeout(function() {
                        $('#not_confirm_password').fadeOut('fast');
                    }, 3000);
                } else if(data === 'Неверный старый пароль, введите верный пароль или воспользуйтесь восстановлением.'){
                    bad_old_password.innerHTML = data;
                    bad_old_password.display = 'block';
                    bad_old_password.style.color = 'red';
                    setTimeout(function() {
                        $('#bad_old_password').fadeOut('fast');
                    }, 3000);
                } else if(data === 'Длинна пароля должна быть не меньше 8 символов.') {
                    small_password.innerHTML = data;
                    small_password.display = 'block';
                    small_password.style.color = 'red';
                    setTimeout(function() {
                        $('#small_password').fadeOut('fast');
                    }, 3000);
                } else {
                    alert(data);
                }
            }
        });
    });
    @if(isset($data['free_courses_navigate']) && $data['free_courses_navigate'] !== NULL)
    @for($i = 0;$i < count($data['free_courses_navigate']);$i++)
    $('body').on('click', '#{{ $i+1 }}', function() {
        let course_article_page = document.getElementById('course_article_page');
        let free_courses_navigate = {!! $data['free_courses_navigate'] !!};
        let course_id = null;
        free_courses_navigate.map((item) => {
            course_id = item.free_courses_name_id;
        });
        $.ajax({
            type: "POST",
            url: '/user/free/course/'+course_id+'/'+{{ $i+1 }},
            data: {

            },
            success: function (data) {
                data.all_free_courses_id.map((item) => {
                    let last_open_free_course_id = document.getElementById(item.id);
                    last_open_free_course_id.classList.remove('active');
                });
                data.free_course.map((item) => {
                    course_article_page.innerHTML = '';
                    if(item.type === 0){
                        course_article_page.innerHTML = item.description;
                    } else if(item.type === 1){
                        course_article_page.innerHTML = ''+item.description+'<div>'+item.task+'</div>';
                    }

                    let id = document.getElementById(item.id);
                    id.classList.add('active')
                });
            }
        });
    });
    @endfor
    @endif
</script>

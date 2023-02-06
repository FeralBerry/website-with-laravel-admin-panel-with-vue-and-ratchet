<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
<script src="{{ asset('back/libs/jquery/dist/jquery.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('back/libs/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('back/libs/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- core -->
<script src="{{ asset('back/libs/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
<script src="{{ asset('back/libs/PACE/pace.min.js') }}"></script>
<script src="{{ asset('back/libs/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('back/libs/blockUI/jquery.blockUI.js') }}"></script>
<script src="{{ asset('back/libs/jscroll/jquery.jscroll.min.js') }}"></script>

<script src="{{ asset('back/scripts/config.lazyload.js') }}"></script>
<script src="{{ asset('back/scripts/ui-load.js') }}"></script>
<script src="{{ asset('back/scripts/ui-jp.js') }}"></script>
<script src="{{ asset('back/scripts/ui-include.js') }}"></script>
<script src="{{ asset('back/scripts/ui-device.js') }}"></script>
<script src="{{ asset('back/scripts/ui-form.js') }}"></script>
<script src="{{ asset('back/scripts/ui-modal.js') }}"></script>
<script src="{{ asset('back/scripts/ui-nav.js') }}"></script>
<script src="{{ asset('back/scripts/ui-list.js') }}"></script>
<script src="{{ asset('back/scripts/ui-screenfull.js') }}"></script>
<script src="{{ asset('back/scripts/ui-scroll-to.js') }}"></script>
<script src="{{ asset('back/scripts/ui-toggle-class.js') }}"></script>
<script src="{{ asset('back/scripts/ui-taburl.js') }}"></script>
<script src="{{ asset('back/scripts/app.js') }}"></script>
<script src="{{ asset('back/scripts/ajax.js') }}"></script>
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
</script>

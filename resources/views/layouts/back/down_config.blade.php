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

</script>

<template>
    <div class="row-col">
        <div class="col-sm-3 col-lg-2 b-r">
            <div class="p-y">
                <div class="nav-active-border left b-primary">
                    <ul class="nav nav-sm">
                        <li class="nav-item">
                            <a class="nav-link block active" href="#" data-toggle="tab" data-target="#tab-1">Профиль</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-2">Account Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-3">Emails</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-4">Уведомления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-5">Сменить пароль</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-lg-10 light bg">
            <div class="tab-content pos-rlt">
                <div class="tab-pane active" id="tab-1">
                    <div class="p-a-md b-b _600">Публичный профиль</div>
                    <div class="row" style="padding: 10px">
                        <div class="col-md-6">
                            <form id="profile_avatar" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" :value="csrf" >
                                <div class="form-group">
                                    <label>Профиль</label>
                                    <button>Изменить</button>
                                    <div class="form-file" v-if="data.auth_user_avatar">
                                        <img id="user_avatar" :src="'/back/img/avatar/'+data.auth_user_avatar" style="position:absolute;height: 300px;width: 300px;z-index: 1">
                                        <input style="z-index: 3;position: absolute;width: 300px;height: 300px" name="avatar" type="file">
                                    </div>
                                    <div class="form-file" v-else>
                                        <img id="user_avatar" src="/back/img/avatar/no-img.png" style="position:absolute;height: 300px;width: 300px;z-index: 1">
                                        <input style="z-index: 3;position: absolute;width: 300px;height: 300px" name="avatar" type="file">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input id="profile_name" name="name" type="text" class="form-control">
                            </div>
                            <button id="profile_update" class="btn btn-info m-t">Обновить</button>
                        </div>
                    </div>
                </div>
                <!--<div class="tab-pane" id="tab-2">
                    <div class="p-a-md b-b _600">Account settings</div>
                    <form role="form" class="p-a-md col-md-6">
                        <div class="form-group">
                            <label>Client ID</label>
                            <input type="text" disabled class="form-control" value="d6386c0651d6380745846efe300b9869">
                        </div>
                        <div class="form-group">
                            <label>Secret Key</label>
                            <input type="text" disabled class="form-control" value="3f9573e88f65787d86d8a685aeb4bd13">
                        </div>
                        <div class="form-group">
                            <label>App Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>App URL</label>
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-info m-t">Update</button>
                    </form>
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="p-a-md b-b _600">Emails</div>
                    <form role="form" class="p-a-md col-md-6">
                        <p>E-mail me whenever</p>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone posts a comment
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone follow me
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
                            </label>
                        </div>
                        <button type="submit" class="btn btn-info m-t">Update</button>
                    </form>
                </div>-->
                <div class="tab-pane" id="tab-4">
                    <div class="p-a-md b-b _600">Notifications</div>
                    <form role="form" class="p-a-md col-md-6">
                        <p>Notice me whenever</p>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone seeing my profile page
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone follow me
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="ui-check">
                                <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
                            </label>
                        </div>
                        <button type="submit" class="btn btn-info m-t">Update</button>
                    </form>
                </div>
                <div class="tab-pane" id="tab-5">
                    <div class="p-a-md b-b _600">Security</div>
                    <div class="p-a-md">
                        <div class="clearfix m-b-lg">
                            <form role="form" class="col-md-6 p-a-0">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>New Password Again</label>
                                    <input type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-info m-t">Update</button>
                            </form>
                        </div>

                        <p><strong>Delete account?</strong></p>
                        <button type="submit" class="btn btn-danger m-t" data-toggle="modal" data-target="#modal">Delete Account</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .modal -->
    <div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
        <div class="row-col h-v">
            <div class="row-cell v-m">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content flip-y">
                        <div class="modal-body text-center">
                            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                            <p>Are you sure to delete your account?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn white p-x-md" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- / .modal -->
</template>
<script>
    export default {
        name: "SettingsComponent",
        props: ['data'],
        data(){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {

        },
        created() {
            let connection = new WebSocket("ws://127.0.0.1:4710");

            $(function(){
                $("#profile_update").on("click", function(){
                    let profile_name = document.getElementById('profile_name').value;
                    $.ajax({
                        url: '/user/profile/edit',
                        method: 'POST',
                        data:{
                            '_token'    :   this.csrf,
                            'name'      :   profile_name
                        },
                        success: function (data) {
                            alert(data);
                        },
                    });
                });
            });
        }
    }
</script>

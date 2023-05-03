<template>
    <bread-crumb-component :data="this.breadcrumb"></bread-crumb-component>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <router-link to="/admin/users/add" class="btn btn-block btn-outline-info">Добавить пользователя</router-link>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Название статьи</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Теги</th>
                                    <th>Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="users_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название статьи</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Теги</th>
                                    <th>Кнопки</th>
                                </tr>
                                </tfoot>
                            </table>
                            <router-link to="/admin/users/add" class="btn btn-block btn-outline-info">Добавить пользователя</router-link>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</template>

<script>
    export default {
        name: "UsersComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Пользователи',
                    'crumbs':{
                        'first':{
                            'title':'Главная',
                            'link':'/admin'
                        },
                        'second':{
                            'title':'Пользователи',
                            'link':'/admin/users'
                        }
                    }
                }
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>

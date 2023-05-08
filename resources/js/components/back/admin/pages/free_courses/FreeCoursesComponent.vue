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
                            <div class="col-md-12" style="margin-top: 20px;margin-bottom: 20px">
                                <router-link to="/admin/free_courses/add" class="btn btn-block btn-outline-info">Добавить</router-link>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width:150px">Заголовок и к какому курсу привязано</th>
                                    <th>Описание</th>
                                    <th style="width:215px">Видео</th>
                                    <th style="width:100px">Тип урока с заданием</th>
                                    <th style="width:75px">Материалы</th>
                                    <th style="width:75px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="free_courses_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Заголовок и к какому курсу привязано</th>
                                    <th>Описание</th>
                                    <th>Видео</th>
                                    <th>Тип урока с заданием</th>
                                    <th>Материалы</th>
                                    <th>Кнопки</th>
                                </tr>
                                </tfoot>
                            </table>
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
        name: "FreeCoursesComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Блог',
                    'crumbs':{
                        'first':{
                            'title':'Главная',
                            'link':'/admin'
                        },
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

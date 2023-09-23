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
                            <form id="pay_courses_name_form" method="post" action="/admin/pay_courses_name/add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control form-control-lg" name="pay_courses_name_title" id="pay_courses_name_title" type="text" placeholder="Название">
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="pay_courses_name_brief" id="pay_courses_name_brief" placeholder="Краткое описание"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="pay_courses_name_img" id="pay_courses_name_img">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="pay_courses_name_link" id="pay_courses_name_link" placeholder="Ссылка">
                                    </div>
                                </div>
                                <button type="submit" style="margin-top:20px" class="btn btn-block btn-outline-info">Добавить</button>
                            </form>
                            <table id="example1" style="margin-top:20px" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Краткое описание</th>
                                    <th style="width: 215px">Картинка</th>
                                    <th>Ссылка</th>
                                    <th style="width: 75px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="pay_courses_name_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название</th>
                                    <th>Краткое описание</th>
                                    <th>Картинка</th>
                                    <th>Ссылка</th>
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
        name: "PayCoursesNameComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Названия платных курсов',
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

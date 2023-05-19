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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Url</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>keywords</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="seo_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Url</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>keywords</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" name="url" id="url" placeholder="URL">
                                    </td>
                                    <td>
                                        <input class="form-control" name="title" id="title" placeholder="Заголовок">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="description" id="description" placeholder="Описание"></textarea>
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="keywords" id="keywords" placeholder="Ключевые слова"></textarea>
                                    </td>
                                    <td><a onclick="seo_add()" class="btn btn-success">Добавить</a></td>
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
        name: "SeoComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'СЕО',
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

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
                                    <th>Автор</th>
                                    <th>Цитата</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="quotes_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Автор</th>
                                    <th>Цитата</th>
                                    <th>Кнопки</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" name="author" id="author" placeholder="Автор">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="quotes" id="quotes" placeholder="Цитата"></textarea>
                                    </td>
                                    <td><a onclick="quotes_add()" class="btn btn-success">Добавить</a></td>
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
        name: "QuotesComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Цитаты',
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

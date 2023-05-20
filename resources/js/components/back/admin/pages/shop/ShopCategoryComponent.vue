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
                                    <th>Название</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="shop_category_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название</th>
                                    <th>Кнопки</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" name="name" id="name" placeholder="Название">
                                    </td>
                                    <td><a onclick="shop_category_add()" class="btn btn-success">Добавить</a></td>
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
        name: "ShopCategoryComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Категории магазина',
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

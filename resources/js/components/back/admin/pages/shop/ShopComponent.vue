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
                            <router-link to="/admin/shop/add" class="btn btn-block btn-outline-info">Добавить</router-link>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="shop_table">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Кнопки</th>
                                </tr>
                                </tfoot>
                            </table>
                            <router-link to="/admin/shop/add" class="btn btn-block btn-outline-info">Добавить</router-link>
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
        name: "ShopComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Магазин',
                    'crumbs':{
                        'first':{
                            'title':'Главная',
                            'link':'/admin'
                        },
                        'second':{
                            'title':'Магазин',
                            'link':'/admin/shop'
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

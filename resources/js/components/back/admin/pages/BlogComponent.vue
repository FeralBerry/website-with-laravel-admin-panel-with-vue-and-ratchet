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
                                    <th>Название статьи</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Engine version</th>
                                    <th>Кнопки</th>
                                </tr>
                                </thead>
                                <tbody v-for="item in this.data.blog">
                                <tr>
                                    <td>{{ item.title }}</td>
                                    <td>{{ item.description }}</td>
                                    <td><img style="width:200px" :src="item.img"></td>
                                    <td> 4</td>
                                    <td>X</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Название статьи</th>
                                    <th>Описание</th>
                                    <th>Картинка</th>
                                    <th>Engine version</th>
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
        name: "BlogComponent",
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
                        'second':{
                            'title':'Блог',
                            'link':'/admin/blog'
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

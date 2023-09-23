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
                                    <th>Тип контакта</th>
                                    <th>Контакт</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="contacts">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Тип контакта</th>
                                    <th>Контакт</th>
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
        name: "ContactComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Контакты',
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

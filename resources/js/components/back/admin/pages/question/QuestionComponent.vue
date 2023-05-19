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
                                    <th>Вопрос с контактов</th>
                                    <th style="width:100px">Кнопки</th>
                                    <th>Вопрос с подвала</th>
                                    <th style="width:100px">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="question">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Вопрос с контактов</th>
                                    <th style="width:100px">Кнопки</th>
                                    <th>Вопрос с подвала</th>
                                    <th style="width:100px">Кнопки</th>
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
        name: "QuestionComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Вопросы',
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

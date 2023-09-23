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
                            <form action="/admin/blog/tags/add" method="post" id="blog_tags_add">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control form-control-lg" name="tag_name" id="tag_name" type="text" placeholder="Название тега">
                                        <input class="form-control form-control-lg" name="icon" id="icon" type="text" placeholder="Иконка">
                                    </div>
                                    <div class="col-md-3" style="margin-top: 20px;margin-bottom: 20px">
                                        <button type="submit" class="btn btn-block btn-outline-info">Добавить</button>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Иконка</th>
                                    <th>Название</th>
                                    <th>Кнопки</th>
                                </tr>
                                </thead>
                                <tbody id="blog_tags">

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Иконка</th>
                                    <th>Название</th>
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
        name: "BlogTagsComponent",
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

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
                            <form id="blog_add" method="post" action="/admin/blog_add" enctype="multipart/form-data">
                                <input type="hidden" name="_token" :value="csrf">
                                <span class="bmd-form-group bmd-form-group-lg">
                                    Название новости
                                    <input class="form-control form-control-lg" name="title" id="blog_title" type="text" placeholder="Название новости">
                                </span>
                                <br>
                                Теги
                                <br>
                                <div class="row col-md-12" id="blog_tags_add">

                                </div>
                                <br>
                                Описание новости
                                <br>
                                <textarea rows="20" name="description" class="summernote"></textarea>
                                Заглавная картинка
                                <br>
                                <input type="file" name="img" id="img">

                                <button type="submit" class="btn btn-block btn-outline-success" style="margin-top: 20px">Отправить</button>
                            </form>
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
        name: "BlogAddComponent",
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
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        created() {

        },
        mounted() {

        }
    }
</script>
<style scoped>

</style>

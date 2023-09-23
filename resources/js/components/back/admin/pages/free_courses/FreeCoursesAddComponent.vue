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
                            <form id="free_courses_edit" method="post" :action="'/admin/free_courses/add'" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <span class="bmd-form-group bmd-form-group-lg">
                                        Название
                                        <input class="form-control form-control-lg" name="title" id="blog_title" type="text"  placeholder="Название новости">
                                    </span>
                                    <br>
                                    Привязка к какому курсу
                                    <br>
                                    <div class="row col-md-12" id="free_courses_name_checked" >
                                        <template v-for="name in this.data.free_courses_name">
                                            <div class="col-md-3 custom-control custom-radio">
                                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_name" :id="'free_courses_name_'+name.id" :value="name.id" type="radio">
                                                <label :for="'free_courses_name_'+name.id" class="custom-control-label"><i class="'+item.icon+'"></i> {{ name.title }}</label>
                                            </div>
                                        </template>
                                    </div>
                                    <br>
                                    Описание
                                    <br>
                                    <textarea rows="20" name="description" class="summernote" id="description"></textarea>
                                    Заглавная картинка
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="video" id="video"><br>
                                            <textarea rows="6" type="text" class="form-control form-control-lg" name="video_youtube" id="video_youtube"></textarea>
                                        </div>
                                    </div>
                                    <input type="file" name="material" id="material">
                                    <div class="row col-md-12" id="free_courses_type">
                                        <div class="col-md-3 custom-control custom-radio">
                                            <input  class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_0" value="0" type="radio">
                                            <label style="margin-top: 10px" for="free_courses_type_0" class="custom-control-label"> Просто описание </label>
                                            </div>
                                            <div class="col-md-3 custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_1" value="1" type="radio">
                                            <label style="margin-top: 10px" for="free_courses_type_1" class="custom-control-label"> Тестовое задание </label>
                                            </div>
                                            <div class="col-md-3 custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_2" value="2" type="radio">
                                            <label style="margin-top: 10px" for="free_courses_type_2" class="custom-control-label"> Тестовое задание </label>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px" class="row">
                                        <div class="col-md-6">
                                            Задание полное для проверки
                                            <textarea rows="20" class="summernote" name="task" id="task"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            Пример начальный
                                            <textarea rows="20" class="summernote" name="example" id="example"></textarea>
                                        </div>
                                    </div>
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
        name: "FreeCoursesAddComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Добавление темы курса',
                    'crumbs':{
                        'first':{
                            'title':'Главная',
                            'link':'/admin'
                        },
                        'second':{
                            'title':'Бесплатные курсы',
                            'link':'/admin/free_courses'
                        }
                    }
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
    }
</script>

<style scoped>

</style>

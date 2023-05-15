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
                            <form id="free_courses_edit" method="post" :action="'/admin/free_courses/edit/'+this.data.free_courses[0].id" enctype="multipart/form-data">
                                <template v-for="item in this.data.free_courses">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <span class="bmd-form-group bmd-form-group-lg">
                                        Название
                                        <input class="form-control form-control-lg" name="title" id="blog_title" type="text" :value="item.title" placeholder="Название новости">
                                    </span>
                                    <br>
                                    Привязка к какому курсу
                                    <br>
                                    <div class="row col-md-12" id="free_courses_name_checked" >
                                        <template v-for="name in this.data.free_courses_name">
                                            <div class="col-md-3 custom-control custom-radio">
                                                <template v-if="name.id == item.free_courses_name_id">
                                                    <input checked class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_name" :id="'free_courses_name_'+name.id" :value="name.id" type="radio">
                                                    <label :for="'free_courses_name_'+name.id" class="custom-control-label"><i class="'+item.icon+'"></i> {{ name.title }}</label>
                                                </template>
                                                <template v-if="name.id !== item.free_courses_name_id">
                                                    <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_name" :id="'free_courses_name_'+name.id" :value="name.id" type="radio">
                                                    <label :for="'free_courses_name_'+name.id" class="custom-control-label"><i class="'+item.icon+'"></i> {{ name.title }}</label>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                    <br>
                                    Описание
                                    <br>
                                    <textarea rows="20" name="description" class="summernote" id="description">{{ item.description }}</textarea>
                                    Заглавная картинка
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="video" id="video"><br>
                                            <textarea rows="6" type="text" class="form-control form-control-lg" name="video_youtube" id="video_youtube"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <template v-if="item.link !== null">
                                                <input type="hidden" name="old_link" :value="item.link">
                                                <input type="hidden" name="old_youtube" value="">
                                                <br>
                                                <video><source :src="item.link" /></video>
                                            </template>
                                            <template v-else-if="item.youtube !== null">
                                                <input type="hidden" name="old_youtube" :value="item.youtube">
                                                <input type="hidden" name="old_link" value="">
                                                <br>
                                                <p v-html="item.youtube"></p>
                                            </template>
                                        </div>
                                    </div>
                                    <input type="file" name="material" id="material">
                                    <input type="hidden" name="old_material" id="old_material" :value="item.material">
                                    <div class="row col-md-12" id="free_courses_type">

                                    </div>
                                    <div style="margin-top: 20px" class="row">
                                        <div class="col-md-6">
                                            Задание полное для проверки
                                            <textarea rows="20" class="summernote" name="task" id="task">{{ item.task }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            Пример начальный
                                            <textarea rows="20" class="summernote" name="example" id="example">{{ item.example }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-outline-success" style="margin-top: 20px">Отправить</button>
                                </template>
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
        name: "FreeCoursesEditComponent",
        props:['data'],
        data(){
            return{
                breadcrumb: {
                    'title':'Рудактирование темы курса ' + this.data.free_courses[0].title,
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
        mounted() {

        },
        created() {
            let type1 = '';
            let type2 = '';
            let type3 = '';
            if(this.data.free_courses[0].type == 0){
                type1 = 'checked';
            } else if(this.data.free_courses[0].type == 1){
                type2 = 'checked';
            } else if(this.data.free_courses[0].type == 2){
                type3 = 'checked';
            };
            setTimeout(function (){
                $('#free_courses_type').html('<div class="col-md-3 custom-control custom-radio">' +
                    '<input '+type1+' class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_0" value="0" type="radio">' +
                    '<label style="margin-top: 10px" for="free_courses_type_0" class="custom-control-label"> Просто описание </label>' +
                    '</div>' +
                    '<div class="col-md-3 custom-control custom-radio">' +
                    '<input '+type2+' class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_1" value="1" type="radio">' +
                    '<label style="margin-top: 10px" for="free_courses_type_1" class="custom-control-label"> Тестовое задание </label>' +
                    '</div>' +
                    '<div class="col-md-3 custom-control custom-radio">' +
                    '<input '+type3+' class="custom-control-input custom-control-input-danger custom-control-input-outline" name="free_courses_type_radio" id="free_courses_type_2" value="2" type="radio">' +
                    '<label style="margin-top: 10px" for="free_courses_type_2" class="custom-control-label"> Тестовое задание </label>' +
                    '</div>')
            },500);

        }
    }
</script>

<style scoped>

</style>

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
                            <form id="free_courses_edit" method="post" :action="'/admin/free_courses/edit/'+this.data.id" enctype="multipart/form-data">
                                <input type="hidden" name="_token" :value="csrf">
                                <span class="bmd-form-group bmd-form-group-lg">
                                    Название
                                    <input class="form-control form-control-lg" name="title" id="blog_title" type="text" :value="this.data.free_courses[0].title" placeholder="Название новости">
                                </span>
                                <br>
                                Теги
                                <br>
                                <div class="row col-md-12" id="blog_tags_edit" >
                                    <template v-for="item in this.data.blog_tags">
                                        <div class="col-md-3 custom-control custom-checkbox">
                                            <template v-if="item.checked == 1">
                                                <input checked class="custom-control-input custom-control-input-danger custom-control-input-outline" name="tags[]" :id="'tag_'+item.id" :value="item.id" type="checkbox">
                                                <label :for="'tag_'+item.id" class="custom-control-label"><i class="'+item.icon+'"></i> {{ item.name }}</label>
                                            </template>
                                            <template v-if="item.checked == 0">
                                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" name="tags[]" :id="'tag_'+item.id" :value="item.id" type="checkbox">
                                                <label :for="'tag_'+item.id" class="custom-control-label"><i class="'+item.icon+'"></i> {{ item.name }}</label>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                                <br>
                                Описание новости
                                <br>
                                <template v-for="item in this.data.blog">
                                    <textarea rows="20" name="description" id="summernote">{{ item.description }}</textarea>
                                </template>
                                Заглавная картинка
                                <br>
                                <template v-for="item in this.data.blog">
                                    <input type="file" name="img" id="img">
                                    <input type="hidden" name="old_img" :value="item.img">
                                    <img style="width:200px;height: 150px" :src="item.img">
                                </template>
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
                            'title':'Блог',
                            'link':'/admin/free_courses'
                        }
                    }
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>

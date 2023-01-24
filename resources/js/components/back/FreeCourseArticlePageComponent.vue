<template>
    <p class="m-a-0 m-b">Содержание урока</p>
    <div class="list-group m-b" v-for="item in data">
        <a href="#" class="list-group-item b-l-primary">
            <span class="pull-right text-primary"><i class="fa fa-circle text-xs"></i></span>
            Border left primary
        </a>
        <a href="#" class="list-group-item b-l-warning">
            <span class="pull-right text-warning"><i class="fa fa-circle text-xs"></i></span>
            Border left warning
        </a>
        <a href="#" class="list-group-item b-l-success">
            <span class="pull-right text-success"><i class="fa fa-circle text-xs"></i></span>
            Border left success
        </a>
        <a href="#" class="list-group-item b-l-danger">
            <span class="pull-right text-danger"><i class="fa fa-circle text-xs"></i></span>
            Border left danger
        </a>
        <a href="#" class="list-group-item b-l-info">
            <span class="pull-right text-info"><i class="fa fa-circle text-xs"></i></span>
            Border left info
        </a>
    </div>
</template>
<script>
    export default {
        name: "FreeCourseComponent",
        props: ['data'],
        mounted() {

        },
        created() {

        }
    }
</script>

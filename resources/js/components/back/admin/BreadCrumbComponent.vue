<template>
    <!-- Content Header (Page header) -->
    <!--<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ data.title }}</h1>
                </div>&lt;!&ndash; /.col &ndash;&gt;
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <template v-if="data.crumbs.first && data.crumbs.second && data.crumbs.third">
                            <li class="breadcrumb-item"><router-link :to="data.crumbs.first.link">{{ data.crumbs.first.title }}</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="data.crumbs.second.link">{{ data.crumbs.second.title }}</router-link></li>
                            <li class="breadcrumb-item active"><router-link :to="data.crumbs.third.link">{{ data.crumbs.third.title }}</router-link></li>
                        </template>
                        <template v-if="data.crumbs.first && data.crumbs.second && !data.crumbs.third">
                            <li class="breadcrumb-item"><router-link :to="data.crumbs.first.link">{{ data.crumbs.first.title }}</router-link></li>
                            <li class="breadcrumb-item active"><router-link :to="data.crumbs.second.link">{{ data.crumbs.second.title }}</router-link></li>
                        </template>
                        <template v-if="data.crumbs.first && !data.crumbs.second && !data.crumbs.third">
                            <li class="breadcrumb-item active"><router-link :to="data.crumbs.first.link">{{ data.crumbs.first.title }}</router-link></li>
                        </template>
                    </ol>
                </div>&lt;!&ndash; /.col &ndash;&gt;
            </div>&lt;!&ndash; /.row &ndash;&gt;
        </div>&lt;!&ndash; /.container-fluid &ndash;&gt;
    </div>-->
</template>
<script>
    export default {
        name: "BreadCrumbComponent",
        props: ['data'],
        mounted() {

        },
        created() {

        }
    }
</script>

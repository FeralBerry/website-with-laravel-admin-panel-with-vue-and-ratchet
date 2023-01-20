<template>
    <!-- page title -->
    <template v-for="link in data.navigate">
        <div v-if="'/public'+link.href === currentUrl || link.href === currentUrl" class="page-title" style="background: #23272d;">
            <div class="grid-row">
                <h1>{{ link.title }}</h1>
                <!-- bread crumb -->
                <nav class="bread-crumb">
                    <router-link to="/">Главная</router-link>
                    <i class="fa fa-long-arrow-right"></i>
                    <router-link :to="link.href">{{ link.title }}</router-link>
                </nav>
                <!-- / bread crumb -->
            </div>
        </div>
    </template>
    <!-- page title -->
</template>
<script>
    export default {
        name: "BreadCrumbComponent",
        props: ['data'],
        data: function() {
            return {
                currentUrl: "",
            };
        },
        created() {
            this.currentUrl = window.location.pathname;
        },
        mounted() {

        },

    }
</script>

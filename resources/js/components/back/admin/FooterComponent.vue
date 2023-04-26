<template>
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 - {{ date_now }} <a href="https://easy-script.io">Easy-Script.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> {{ this.data.version }}
        </div>
    </footer>
</template>
<script>
    export default {
        name: "FooterComponent",
        props: ['data'],
        data() {
            return {
                today:'',
                date_now:'',
            }
        },
        mounted() {

        },
        created() {
            this.today = new Date();
            this.date_now = this.today.getFullYear()
        }
    }
</script>

<template>
    <div class="pull-right text-sm text-muted">Version 1.0.3</div>
    <span class="text-sm text-muted">&copy; Copyright. 2020 - {{ date_now }} </span>
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

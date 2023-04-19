<template>
    <div class="col-md-12" :style="
    'background-image:url(/front/img/slider/'+this.item_data.img+');' +
    'width:100%;' +
    'min-height:400px;' +
    'background-size: cover;'">
    </div>
</template>
<script>
    export default {
        name: "SlideItemComponent",
        props:['item_data','currentSlideIndex'],
        created() {

        },

    }
</script>

<style scoped>


</style>

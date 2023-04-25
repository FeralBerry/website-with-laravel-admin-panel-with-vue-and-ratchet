<template>
    <div class="faq_slide_item" :style="
    'background-image:url(/front/img/slider/'+this.item_data.img+');' +
    'width:100%;' +
    'background-size: cover;'">
    </div>
</template>
<script>
    export default {
        name: "SlideFaqItemComponent",
        props:['item_data','currentSlideIndex'],
        created() {

        },

    }
</script>
<style scoped>
    .faq_slide_item{
        min-height:350px;
    }
    @media (max-device-width : 375px){
        .faq_slide_item{
            min-height:250px;
        }
    }
    @media (min-device-width : 376px) and (max-device-width : 393px){
        .faq_slide_item{
            min-height:275px;
        }
    }
    @media (min-device-width : 394px) and (max-device-width : 414px){
        .faq_slide_item{
            min-height:290px;
        }
    }
    @media (min-device-width : 414px) and (max-device-width : 820px){
        .faq_slide_item{
            min-height:300px;
        }
    }
</style>

<template>
    <div class="faq-banner">
        <div class="faq-slider" :style="{'width':''+(100*this.count_slide)+'%','margin-left':'-'+(100*currentSlideIndex)+'%'}">
            <SlideFaqItemComponent
            v-for="item in this.data.data"
            :key="item.id"
            :item_data="item"
            :currentSlideIndex="this.currentSlideIndex"
            ></SlideFaqItemComponent>
        </div>
    </div>

    <hr class="divider-color">
</template>
<script>
    import SlideFaqItemComponent from "./SlideFaqItemComponent";
    export default {
        name: "SliderComponent",
        components: {SlideFaqItemComponent},
        props:['data'],
        data(){
            return{
                currentSlideIndex:0,
                interval:5000,
                count_slide:0
            }
        },
        created() {

        },
        methods:{
            nextSlide(){
                if(this.currentSlideIndex+1 == this.data.data.length){
                    this.currentSlideIndex = 0
                } else {
                    this.currentSlideIndex++
                }
            },
            prevSlide(){
                if(this.currentSlideIndex > 0){
                    this.currentSlideIndex--
                } else {
                    this.currentSlideIndex = this.data.data.length - 1
                }
            }
        },
        mounted() {
            this.count_slide = this.data.data.length;
            if(this.interval > 0){
                let wm = this;
                setInterval(function(){
                    wm.nextSlide()
                },wm.interval);
            }
        }
    }
</script>
<style>
    .faq-banner{
        min-height: 350px;
        overflow: hidden;
    }
    .faq-slider{
        width: 100%;
        display: flex;
        transition: all ease .5s;
    }
    @media (max-device-width : 375px){
        .faq-banner{
            width:100%;
            min-height: 250px;
        }
    }
    @media (min-device-width : 376px) and (max-device-width : 393px){
        .faq-banner{
            width:100%;
            min-height: 275px;
        }
    }
    @media (min-device-width : 394px) and (max-device-width : 414px){
        .faq-banner{
            width:100%;
            min-height: 290px;
        }
    }
    @media (min-device-width : 414px) and (max-device-width : 820px){
        .faq-banner{
            min-height: 290px;
        }
    }
</style>
